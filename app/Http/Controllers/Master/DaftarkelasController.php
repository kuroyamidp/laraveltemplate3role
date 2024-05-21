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
            'mulai' => 'required',
            'hari' => 'required',
            'selesai' => 'required|after:mulai',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // Additional validation to check if dosen's time does not overlap with existing classes on the same day
        $start = $request->mulai;
        $end = $request->selesai;
        $dosen_id = $request->dosen;
        $hari = $request->hari;

        $overlapCheck = DaftarkelasModel::where('hari', $hari)
            ->where('dosen_id', $dosen_id)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start', [$start, $end])
                    ->orWhereBetween('end', [$start, $end])
                    ->orWhere(function ($query) use ($start, $end) {
                        $query->where('start', '<=', $start)
                            ->where('end', '>=', $end);
                    });
            })->exists();

        if ($overlapCheck) {
            return Redirect::back()->withErrors(['dosen' => 'Waktu dosen bertabrakan dengan kelas yang sudah ada pada hari yang sama.']);
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
            'start' => $request->mulai,
            'end' => $request->selesai,
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
            'mulai' => 'required',
            'selesai' => 'required|after:' . $request->mulai,
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
            'start' => $request->mulai,
            'end' => $request->selesai,
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
        $iterations = 100;
        $employedBeesCount = 20;
        $onlookerBeesCount = 10;
        $scoutBeesCount = 5;
        $populationSize = $employedBeesCount + $onlookerBeesCount;

        $population = $this->initializePopulation($populationSize, $id);

        $statistics = [];

        for ($iter = 0; $iter < $iterations; $iter++) {
            $employedBees = $this->employedBeesPhase($population, $employedBeesCount, $id);
            $onlookerBees = $this->onlookerBeesPhase($employedBees, $id);
            $scoutBees = $this->scoutBeesPhase($population, $scoutBeesCount, $id);

            $population = array_merge($employedBees, $onlookerBees, $scoutBees);

            $this->evaluatePopulation($population);

            $bestSchedule = $this->getBestSchedule($population);

            // Simpan statistik untuk iterasi ini
            $fitnessValues = array_column($population, 'fitness');
            $statistics[] = [
                'iteration' => $iter + 1,
                'best_fitness' => $bestSchedule['fitness'],
                'average_fitness' => array_sum($fitnessValues) / count($fitnessValues),
                'worst_fitness' => max($fitnessValues),
            ];
        }

        $bestSchedule = $this->getBestSchedule($population);

        if ($bestSchedule === null) {
            throw new \Exception('Tidak ada jadwal terbaik yang ditemukan');
        }

        return view('pages.daftarkelas.optimized_schedule', [
            'schedule' => [$bestSchedule],
            'statistics' => $statistics,
        ]);
    }

    // Fungsi untuk inisialisasi populasi awal secara acak
    private function initializePopulation($populationSize, $id)
    {
        $population = [];
        for ($i = 0; $i < $populationSize; $i++) {
            $population[] = $this->createRandomSchedule($id);
        }
        return $population;
    }

    private function createRandomSchedule($id)
    {
        $randomSchedule = DaftarkelasModel::find($id);

        $schedule = [
            'kode_kelas' => $randomSchedule->kode_kelas,
            'matkul' => $randomSchedule->matkul,
            'progdi' => $randomSchedule->progdi,
            'ruang' => $randomSchedule->ruang,
            'dosen' => $randomSchedule->dosen,
            'start' => $randomSchedule->start,
            'end' => $randomSchedule->end,
            'hari' => $randomSchedule->hari,
            'kelas' => $randomSchedule->kelas,
        ];

        return $schedule;
    }

    // Fungsi untuk mengevaluasi populasi
    private function evaluatePopulation(&$population)
    {
        foreach ($population as &$individual) {
            $individual['fitness'] = $this->evaluateSchedule($individual);
        }
    }

    // Fungsi untuk mengevaluasi jadwal individu
    private function evaluateSchedule($schedule)
    {
        $fitnessScore = 0;
        $teacherTimeConflicts = [];

        foreach ($schedule as $class) {
            if (!isset($class['hari'], $class['start'], $class['end'], $class['dosen'])) {
                continue;
            }

            $timeSlot = $class['hari'] . $class['start'] . $class['end'];
            $teacher = $class['dosen'];

            if (!isset($teacherTimeConflicts[$teacher])) {
                $teacherTimeConflicts[$teacher] = [];
            }
            if (!isset($teacherTimeConflicts[$teacher][$timeSlot])) {
                $teacherTimeConflicts[$teacher][$timeSlot] = 0;
            }
            $teacherTimeConflicts[$teacher][$timeSlot]++;
            if ($teacherTimeConflicts[$teacher][$timeSlot] > 1) {
                $fitnessScore += 10; // Penalti untuk konflik dosen
                Log::info('Konflik dosen ditemukan: ' . json_encode($class));
            }
        }

        Log::info('Fitness Score: ' . $fitnessScore);
        return $fitnessScore;
    }


    // Fungsi untuk memilih lebah pekerja
    private function employedBeesPhase($population, $employedBeesCount, $id)
    {
        $employedBees = [];
        for ($i = 0; $i < $employedBeesCount; $i++) {
            $employedBees[] = $this->createRandomSchedule($id);
        }
        return $employedBees;
    }

    private function onlookerBeesPhase($employedBees, $id)
    {
        $onlookerBees = [];
        foreach ($employedBees as $bee) {
            if (rand(0, 1) > 0.5) {
                $onlookerBees[] = $bee;
            }
        }
        return $onlookerBees;
    }

    private function scoutBeesPhase($population, $scoutBeesCount, $id)
    {
        $scoutBees = [];
        for ($i = 0; $i < $scoutBeesCount; $i++) {
            $scoutBees[] = $this->createRandomSchedule($id);
        }
        return $scoutBees;
    }

    // Fungsi untuk memilih jadwal terbaik dari populasi
    private function getBestSchedule($population)
    {
        // Cek apakah populasi kosong
        if (empty($population)) {
            throw new \Exception('Populasi kosong');
        }

        // Urutkan populasi berdasarkan nilai fitness
        usort($population, function ($a, $b) {
            return $a['fitness'] <=> $b['fitness'];
        });

        // Kembalikan jadwal dengan nilai fitness terbaik (terendah)
        return $population[0] ?? null;
    }
}
