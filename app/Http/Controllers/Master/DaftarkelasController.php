<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\DaftarkelasModel;
use App\Models\Master\DosenModel;
use App\Models\Master\JadwalkelasModel;
use App\Models\Master\MatakuliahModel;
use App\Models\Master\ProgdiModel;
use App\Models\Master\KelasModel;
use App\Models\Master\RuangModel;
use App\Models\Master\WaktuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DaftarkelasController extends Controller
{
    public function index()
    {
        $data['kelas'] = DaftarkelasModel::get();
        $conflicts = $this->detectScheduleConflicts($data['kelas']);

        if (!empty($conflicts)) {
            $data['conflicts'] = $conflicts;
        }

        return view('pages.daftarkelas.daftarkelas', $data);
    }

    public function create()
    {
        $data['progdi'] = ProgdiModel::get();
        $data['dosen'] = DosenModel::get();
        $data['matkul'] = MatakuliahModel::get();
        $data['ruang'] = RuangModel::get();
        $data['kelas'] = KelasModel::get();
        $data['waktu'] = WaktuModel::get();
        return view('pages.daftarkelas.tambahkelas', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_kelas' => 'required',
            'mata_kuliah' => 'required',
            'ruang_kelas' => 'required',
            'progdi' => 'required',
            'dosen' => 'required',
            'kelas' => 'required',
            'waktu' => 'required',
            'hari' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $existingKelas = DaftarkelasModel::where('kode_kelas', $request->kode_kelas)->exists();

        if ($existingKelas) {
            return Redirect::back()->withErrors(['kode_kelas' => 'Kode kelas sudah digunakan.'])->withInput();
        }

        DaftarkelasModel::create([
            'uid' => Str::uuid(),
            'kode_kelas' => $request->kode_kelas,
            'progdi_id' => $request->progdi,
            'makul_id' => $request->mata_kuliah,
            'dosen_id' => $request->dosen,
            'ruang_id' => $request->ruang_kelas,
            'semester' => $request->kelas,
            'hari' => $request->hari,
            'start' => $request->waktu,
        ]);

        return redirect('/daftar-kelas')->with('success', 'Berhasil tambah data');
    }

    public function show($id)
    {
        $data['progdi'] = ProgdiModel::get();
        $data['dosen'] = DosenModel::get();
        $data['matkul'] = MatakuliahModel::get();
        $data['ruang'] = RuangModel::get();
        $data['kls'] = KelasModel::get();
        $data['waktu'] = WaktuModel::get();
        $data['kelas'] = DaftarkelasModel::where('uid', $id)->first();
        return view('pages.daftarkelas.editkelas', $data);
    }

    public function edit($id)
    {
        // Implement if needed
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_kelas' => 'required',
            'mata_kuliah' => 'required',
            'ruang_kelas' => 'required',
            'progdi' => 'required',
            'kelas' => 'required',
            'dosen' => 'required',
            'hari' => 'required',
            'waktu' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        DaftarkelasModel::where('uid', $id)->update([
            'kode_kelas' => $request->kode_kelas,
            'progdi_id' => $request->progdi,
            'makul_id' => $request->mata_kuliah,
            'dosen_id' => $request->dosen,
            'ruang_id' => $request->ruang_kelas,
            'start' => $request->waktu,
            'semester' => $request->kelas,
            'hari' => $request->hari,
        ]);

        return redirect('/daftar-kelas')->with('success', 'Berhasil update data');
    }

    public function destroy($id)
    {
        DaftarkelasModel::where('uid', $id)->delete();
        return redirect('/daftar-kelas');
    }

    public function getkelas(Request $request)
    {
        $avlb = JadwalkelasModel::where('semester', $request->semester)->get();
        $kls = [];
        foreach ($avlb as $value) {
            $kls[] = $value->kelas_id;
        }

        return DaftarkelasModel::where('semester', $request->semester)->whereNotIn('id', $kls)->get();
    }

    public function searchByMatkul(Request $request)
    {
        $search = $request->input('search');
        $kelas = DaftarkelasModel::all();
        $result = [];

        foreach ($kelas as $item) {
            if (
                stripos($item->kode_kelas, $search) !== false ||
                $item->matkul == $search ||
                $item->ruang == $search ||
                $item->progdi == $search ||
                $item->kelas == $search ||
                $item->dosen == $search ||
                stripos($item->hari, $search) !== false
            ) {
                $result[] = $item;
            }
        }

        return response()->json($result);
    }
    public function optimizeSchedule($id)
    {
        $timeSlots = WaktuModel::pluck('jam')->toArray();
        $rooms = RuangModel::pluck('nama', 'id')->toArray();
        $dosen = DosenModel::pluck('nama', 'id')->toArray();
        $classes = DaftarkelasModel::all();

        $schedule = $this->generateSchedule($classes, $timeSlots, $rooms, $dosen);

        session(['optimized_schedule' => $schedule]);

        return view('pages.daftarkelas.optimized_schedule', [
            'changes' => $schedule,
        ]);
    }
    public function generateSchedule($classes, $timeSlots, $rooms, $dosen)
    {
        $schedule = [];

        foreach ($classes as $class) {
            $scheduled = false;
            $day = $class->hari;

            $availableRooms = array_filter($rooms, function ($roomId) use ($class) {
                return $roomId == $class->ruang_id;
            }, ARRAY_FILTER_USE_KEY);

            foreach ($timeSlots as $timeSlot) {
                foreach ($availableRooms as $roomId => $roomName) {
                    if ($this->isSlotAvailable($schedule, $day, $timeSlot, $roomName, $class->dosen_id)) {
                        $schedule[] = [
                            'kode_kelas' => $class->kode_kelas,
                            'makul_id' => $class->makul_id,
                            'progdi_id' => $class->progdi_id,
                            'ruang' => $roomName,
                            'ruang_id' => $roomId,
                            'dosen_id' => $class->dosen_id,
                            'dosen_name' => $dosen[$class->dosen_id],
                            'waktu' => $timeSlot,
                            'hari' => $day,
                            'semester' => $class->semester,
                        ];

                        $scheduled = true;
                        break 2;
                    }
                }
            }
        }

        return $schedule;
    }

    private function isSlotAvailable($schedule, $day, $timeSlot, $room, $dosen)
    {
        foreach ($schedule as $entry) {
            if ($entry['hari'] == $day && $entry['waktu'] == $timeSlot) {
                if ($entry['ruang'] == $room || $entry['dosen_id'] == $dosen) {
                    return false;
                }
            }
        }
        return true;
    }

    public function saveChanges(Request $request)
    {
        $changes = json_decode($request->input('changes'), true);

        if (!is_array($changes)) {
            return redirect()->back()->withErrors(['error' => 'Invalid data format']);
        }

        $timeSlots = WaktuModel::pluck('jam')->toArray();
        $rooms = RuangModel::pluck('nama', 'id')->toArray();
        $dosen = DosenModel::pluck('nama', 'id')->toArray();
        $classes = DaftarkelasModel::all();

        $schedule = $this->generateSchedule($classes, $timeSlots, $rooms, $dosen);
        DaftarkelasModel::truncate();
        foreach ($schedule as $change) {
            DaftarkelasModel::create([
                'uid' => Str::uuid(),
                'kode_kelas' => $change['kode_kelas'],
                'progdi_id' => $change['progdi_id'],
                'makul_id' => $change['makul_id'],
                'dosen_id' => $change['dosen_id'],
                'ruang_id' => $change['ruang_id'],
                'semester' => $change['semester'],
                'hari' => $change['hari'],
                'start' => $change['waktu'],
            ]);
        }

        return redirect('/daftar-kelas')->with('success', 'Data Berhasil Diubah');
    }

    private function detectScheduleConflicts($classes)
    {
        $schedule = [];
        $conflicts = [];

        foreach ($classes as $class) {
            $day = $class->hari;
            $timeSlot = $class->start;
            $room = $class->ruang_id;
            $dosen = $class->dosen_id;

            if (!$this->isSlotAvailable($schedule, $day, $timeSlot, $room, $dosen)) {
                $conflicts[] = [
                    'kode_kelas' => $class->kode_kelas,
                    'progdi' => $class->progdi, 
                    'mata_kuliah' => $class->matakuliah, 
                    'ruang' => $class->ruang, 
                    'dosen' => $class->dosen, 
                    'hari' => $day,
                    'waktu' => $timeSlot,
                ];
            } else {
                $schedule[] = [
                    'hari' => $day,
                    'waktu' => $timeSlot,
                    'ruang' => $room,
                    'dosen_id' => $dosen,
                ];
            }
        }

        return $conflicts;
    }
}
