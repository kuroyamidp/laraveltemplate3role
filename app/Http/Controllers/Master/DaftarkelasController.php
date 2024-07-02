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
use Faker\ORM\CakePHP\Populator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class DaftarkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kelas'] = DaftarkelasModel::get();
        // return $data;
        return view('pages.daftarkelas.daftarkelas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        // Response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // Additional validation to check if the same mata kuliah is already scheduled for the same progdi on the same day
        // $existingClass = DaftarkelasModel::where('progdi_id', $request->progdi)
        //     ->where('makul_id', $request->mata_kuliah)
        //     ->where('hari', $request->hari)
        //     ->first();

        // if ($existingClass) {
        //     return Redirect::back()->withErrors(['error' => 'Mata kuliah sudah dijadwalkan untuk program studi ini pada hari yang sama.']);
        // }

        DaftarkelasModel::create([
            'uid' => Str::uuid(),
            'kode_kelas' => $request->kode_kelas,
            'progdi' => $request->progdi,
            'matkul' => $request->mata_kuliah,
            'dosen' => $request->dosen,
            'ruang' => $request->ruang_kelas,
            'semester' => $request->kelas,
            'hari' => $request->hari,
            'start' => $request->waktu,
        ]);

        return redirect('/daftar-kelas')->with('success', 'Berhasil tambah data');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        // response error validation
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DaftarkelasModel::where('uid', $id)->delete();
        return redirect('/daftar-kelas');
    }

    public function getkelas(Request $request)
    {
        $avlb = JadwalkelasModel::where('semester', $request->semester)->get();
        $kls = [];
        foreach ($avlb as $key => $value) {
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
        // Inisialisasi data yang dibutuhkan
        $timeSlots = WaktuModel::pluck('jam')->toArray(); // Mengambil slot waktu
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']; // Hari dalam seminggu
        $rooms = RuangModel::pluck('nama')->toArray(); // Mengambil nama ruangan
        $classes = DaftarkelasModel::all(); // Mengambil semua data kelas

        $schedule = []; // Inisialisasi jadwal kosong

        // Iterasi melalui setiap kelas
        foreach ($classes as $class) {
            $scheduled = false;
            // Iterasi melalui setiap hari
            foreach ($days as $day) {
                // Iterasi melalui setiap slot waktu
                foreach ($timeSlots as $timeSlot) {
                    // Iterasi melalui setiap ruangan
                    foreach ($rooms as $room) {
                        // Memeriksa ketersediaan slot waktu, ruangan, dan dosen
                        if ($this->isSlotAvailable($schedule, $day, $timeSlot, $room, $class->dosen)) {
                            // Menambahkan kelas ke dalam jadwal
                            $schedule[] = [
                                'kode_kelas' => $class->kode_kelas,
                                'matkul' => $class->matkul,
                                'progdi' => $class->progdi,
                                'ruang' => $room,
                                'dosen' => $class->dosen,
                                'waktu' => $timeSlot,
                                'hari' => $day,
                                'kelas' => $class->kelas,
                                'fitness' => 0,
                                'id' => $id
                            ];
                            $scheduled = true;
                            break 3; // Keluar dari tiga loop dan pindah ke kelas berikutnya
                        }
                    }
                }
                if ($scheduled) break; // Keluar jika kelas sudah dijadwalkan
            }
        }

        // Mengembalikan tampilan dengan jadwal yang dioptimalkan
        return view('pages.daftarkelas.optimized_schedule', [
            'schedule' => $schedule,
        ]);
    }

    private function isSlotAvailable($schedule, $day, $timeSlot, $room, $dosen)
    {
        // Memeriksa ketersediaan slot waktu, ruangan, dan dosen
        foreach ($schedule as $entry) {
            if ($entry['hari'] == $day && $entry['waktu'] == $timeSlot) {
                if ($entry['ruang'] == $room || $entry['dosen'] == $dosen) {
                    return false; // Konflik terdeteksi
                }
            }
        }
        return true; // Tidak ada konflik
    }
}
