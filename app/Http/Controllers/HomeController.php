<?php

namespace App\Http\Controllers;

use App\Models\Master\JadwalkelasModel;
use App\Models\Master\KrsModel;
use App\Models\Master\DaftarkelasModel;
use App\Models\Master\DosenModel;
use App\Models\Master\MahasiswaModel; 
use App\Models\Master\MatakuliahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

        if (Auth::user()->role_id == 0) {
            // $data['krs'] = KrsModel::with('mahasiswa')->get();
            return view('pages.dashboard.dashboardadmin');

        } elseif (Auth::user()->role_id == 1) {

             $currentDay = Carbon::now()->locale('id')->dayName;

            // Mengonversi hari dalam Bahasa Indonesia menjadi format yang diinginkan
            $currentDay = match ($currentDay) {
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu',
                'Minggu' => 'Minggu',
            };
            $dosenNama = Auth::user()->dosen['id'];

            $dos = DaftarkelasModel::join('dosen', function($join) use ($dosenNama, $currentDay) {
                $join->on('daftar_kelas.dosen_id', '=', 'dosen.id')
                     ->where('dosen.id', $dosenNama)
                     ->where('daftar_kelas.hari', $currentDay); // Menyesuaikan dengan hari berjalan
                    })
                     ->distinct() // Hanya ambil hasil unik
                     ->get();
                 
            $data['dos'] = $dos;
            $data['currentDay'] = $currentDay;

        return view('pages.dashboard.dashboarddosen', $data);
        } else {
            
            $currentDay = Carbon::now()->locale('id')->dayName;

            // Mengonversi hari dalam Bahasa Indonesia menjadi format yang diinginkan
            $currentDay = match ($currentDay) {
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu',
                'Minggu' => 'Minggu',
            };
            
            $mahasiswaProgdiId = Auth::user()->mahasiswa['progdi_id'];
            $mahasiswaSemesterId = Auth::user()->mahasiswa['semester_id'];
            
            $jdw = DaftarkelasModel::join('mahasiswa', function($join) use ($mahasiswaProgdiId, $mahasiswaSemesterId, $currentDay) {
                $join->on('daftar_kelas.progdi_id', '=', 'mahasiswa.progdi_id')
                     ->on('daftar_kelas.semester', '=', 'mahasiswa.semester_id')
                     ->where('mahasiswa.progdi_id', $mahasiswaProgdiId)
                     ->where('mahasiswa.semester_id', $mahasiswaSemesterId)
                     ->where('daftar_kelas.hari', $currentDay); // Menyesuaikan dengan hari berjalan
            })
            ->distinct() // Hanya ambil hasil unik
            ->get();
            
            $data['jdw'] = $jdw;
            $data['currentDay'] = $currentDay;
            return view('pages.dashboard.dashboardmahasiswa', $data);
            
        }
    }

    public function updateHome(Request $request, $id) {
        // Validasi input dari form
        $request->validate([
            'jadwal_id' =>'required',
            'kode_mk' => 'required',
        ]);
    
        // Ambil data KRS yang ingin diubah
        $krs = KrsModel::find($id);
    
        // Update data KRS
        $krs->mata_kuliah = $request->input('jadwal_id');
        $krs->save();
    
        // Redirect ke halaman KRS
        return redirect('/krs');
    }
    public function destroy($id)
    {
        $krs = KrsModel::find($id);
        $krs->delete();
        return redirect('/dashboard');

    }
}