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
    public function optimizeSchedule()
    {
        // Tentukan parameter algoritma ABC
        $iterations = 100; // Jumlah iterasi
        $employedBeesCount = 20; // Jumlah lebah pekerja
        $onlookerBeesCount = 10; // Jumlah lebah pengamat
        $scoutBeesCount = 5; // Jumlah lebah penjelajah
        $populationSize = $employedBeesCount + $onlookerBeesCount; // Ukuran populasi

        // Inisialisasi populasi awal secara acak
        $population = $this->initializePopulation($populationSize);

        // Logging
        Log::info('Starting optimization process with ABC');

        // Lakukan iterasi sebanyak yang ditentukan
        for ($iter = 0; $iter < $iterations; $iter++) {
            // PHASE 1: Lebah Pekerja (Employed Bees)
            $employedBees = $this->employedBeesPhase($population, $employedBeesCount);

            // PHASE 2: Lebah Pengamat (Onlooker Bees)
            $onlookerBees = $this->onlookerBeesPhase($employedBees);

            // PHASE 3: Lebah Penjelajah (Scout Bees)
            $scoutBees = $this->scoutBeesPhase($population, $scoutBeesCount);

            // Gabungkan hasil dari semua jenis lebah
            $population = array_merge($employedBees, $onlookerBees, $scoutBees);

            // Evaluasi populasi setelah iterasi
            $this->evaluatePopulation($population);
        }

        // Ambil jadwal terbaik dari populasi
        $bestSchedule = $this->getBestSchedule($population);

        // Logging
        Log::info('Best schedule obtained using ABC');

        // Render view dengan hasil optimasi
        return view('pages.daftarkelas.optimized_schedule', ['schedule' => $bestSchedule]);
    }


    // Fungsi untuk menginisialisasi populasi awal secara acak
    private function initializePopulation($populationSize)
    {
        $population = [];
        for ($i = 0; $i < $populationSize; $i++) {
            $population[] = $this->createRandomSchedule();
        }
        return $population;
    }

    // Fungsi untuk membuat jadwal acak dari data yang tersedia
    private function createRandomSchedule()
    {
        $randomSchedule = DaftarkelasModel::inRandomOrder()->first();

        // Buat jadwal acak dari data yang dipilih
        $schedule = [
            'kode_kelas' => $randomSchedule->kode_kelas,
            'matkul' => $randomSchedule->matkul,
            'progdi' => $randomSchedule->progdi,
            'ruang' => $randomSchedule->ruang,
            'dosen' => $randomSchedule->dosen,
            'start' => $randomSchedule->start,
            'end' => $randomSchedule->end,
            'hari' => $randomSchedule->hari,
            'kelas' => $randomSchedule->kelas
        ];

        return $schedule;
    }

    private function evaluatePopulation($population)
    {
        // Evaluasi fitness setiap individu dalam populasi
        foreach ($population as &$individual) {
            $individual['fitness'] = $this->evaluateSchedule($individual);
        }
        return $population;
    }

    private function evaluateSchedule($schedule)
    {
        // Hitung fitness dari jadwal
        // Misalnya: Semakin kecil konflik, semakin tinggi fitness
        return rand(1, 100); // Ini adalah placeholder, implementasi asli harus menghitung fitness dengan tepat
    }

    private function selection($population)
    {
        // Seleksi orang tua dari populasi
        usort($population, function ($a, $b) {
            return $b['fitness'] <=> $a['fitness'];
        });

        return array_slice($population, 0, count($population) / 2);
    }

    private function crossover($parents)
    {
        var_dump($parents); // atau dd($parents) untuk Laravel

        // Melakukan crossover untuk menghasilkan offspring
        $parents = array_values($parents); // Mengatur ulang indeks array
        $count = count($parents);

        for ($i = 0; $i < $count - 1; $i += 2) { // Ubah batas loop untuk menghindari akses out-of-bounds
            $parent1 = $parents[$i];
            $parent2 = $parents[$i + 1];

            $child1 = $parent1;
            $child2 = $parent2;

            // Lakukan crossover
            $child1['kode_kelas'] = $parent2['kode_kelas'];
            $child2['kode_kelas'] = $parent1['kode_kelas'];

            $offspring[] = $child1;
            $offspring[] = $child2;
        }

        // Jika jumlah parents ganjil, tambahkan parent terakhir tanpa crossover
        if ($count % 2 != 0) {
            $offspring[] = $parents[$count - 1];
        }

        return $offspring;
    }


    private function mutation($offspring)
    {
        // Melakukan mutasi pada offspring
        foreach ($offspring as &$child) {
            if (rand(0, 100) / 100 < 0.1) { // 10% chance of mutation
                $randomMatkul = MatakuliahModel::inRandomOrder()->first();
                $child['matkul'] = $randomMatkul->nama;
            }
        }
        foreach ($offspring as &$child) {
            if (rand(0, 100) / 100 < 0.1) { // 10% chance of mutation
                $randomDosen = DosenModel::inRandomOrder()->first();
                $child['dosen'] = $randomDosen->nama;
            }
        }
        foreach ($offspring as &$child) {
            if (rand(0, 100) / 100 < 0.1) { // 10% chance of mutation
                $randomRuang = RuangModel::inRandomOrder()->first();
                $child['ruang'] = $randomRuang->nama;
            }
        }
        foreach ($offspring as &$child) {
            if (rand(0, 100) / 100 < 0.1) { // 10% chance of mutation
                $randomProgdi = ProgdiModel::inRandomOrder()->first();
                $child['progdi'] = $randomProgdi->singkatan_studi;
            }
        }
        foreach ($offspring as &$child) {
            if (rand(0, 100) / 100 < 0.1) { // 10% chance of mutation
                $child['kode_kelas'] =  rand(1, 10);
            }
        }
        return $offspring;
    }

    private function selectSurvivors($population, $populationSize)
    {
        // Seleksi individu terbaik untuk bertahan
        usort($population, function ($a, $b) {
            return $b['fitness'] <=> $a['fitness'];
        });

        return array_slice($population, 0, $populationSize);
    }

    private function getBestSchedule($population)
    {
        // Mengambil jadwal terbaik dari populasi
        usort($population, function ($a, $b) {
            return $b['fitness'] <=> $a['fitness'];
        });

        return $population;
    }
}
