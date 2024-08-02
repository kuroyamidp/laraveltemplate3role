<?php

namespace App\Http\Controllers;

use App\Models\Master\JadwalkelasModel;
use App\Models\Master\KrsModel;
use App\Models\Master\DaftarkelasModel;
use App\Models\Master\KeteranganGuruModel;
use App\Models\Master\DosenModel;
use App\Models\Master\MahasiswaModel;
use App\Models\Master\MatakuliahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;
use PDF;
use App\Models\Master\AbsensiModel;

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
            $currentDate = Carbon::now()->toDateString();

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

            $dosenId = Auth::user()->dosen['id'];

            $dos = DaftarkelasModel::join('dosen', function ($join) use ($dosenId, $currentDay) {
                $join->on('daftarkelas_models.dosen_id', '=', 'dosen.id')
                    ->where('dosen.id', $dosenId)
                    ->where('daftarkelas_models.hari', $currentDay);
            })
                ->select('daftarkelas_models.*')
                ->distinct()
                ->get();

            $data['dos'] = $dos;
            $data['currentDay'] = $currentDay;
            $data['currentDate'] = $currentDate;

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

            $jdw = DaftarkelasModel::join('mahasiswa', function ($join) use ($mahasiswaProgdiId, $mahasiswaSemesterId, $currentDay) {
                $join->on('daftarkelas_models.progdi_id', '=', 'mahasiswa.progdi_id')
                    ->on('daftarkelas_models.semester', '=', 'mahasiswa.semester_id')
                    ->where('mahasiswa.progdi_id', $mahasiswaProgdiId)
                    ->where('mahasiswa.semester_id', $mahasiswaSemesterId)
                    ->where('daftarkelas_models.hari', $currentDay);
            })
                ->select('daftarkelas_models.*')
                ->distinct()
                ->get();

            $data['jdw'] = $jdw;
            $data['currentDay'] = $currentDay;
            return view('pages.dashboard.dashboardmahasiswa', $data);
        }
    }


    public function updateKeterangan(Request $request, $daftarkelas_id)
    {
        $request->validate([
            'keterangan' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $keteranganDosen = new KeteranganGuruModel();
        $keteranganDosen->dosen_id = Auth::user()->dosen['id'];
        $keteranganDosen->daftarkelas_id = $daftarkelas_id;
        $keteranganDosen->tanggal = Carbon::now()->toDateString();
        $keteranganDosen->keterangan = $request->input('keterangan');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $keteranganDosen->image = $imagePath;
        }

        if ($keteranganDosen->save()) {
            return redirect('/home')->with('success', 'Keterangan dan gambar berhasil diperbarui.');
        } else {
            return redirect('/home')->with('error', 'Terjadi kesalahan saat memperbarui keterangan.');
        }
    }



    public function updateHome(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'jadwal_id' => 'required',
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
    public function exportPDF()
    {
        $dosenId = Auth::user()->dosen['id'];
        $progdiId = Auth::user()->dosen['progdi_id'];
        $kelasId = Auth::user()->dosen['kelas_id'];
        $currentDay = Carbon::now()->locale('id')->dayName;
        $currentDate = Carbon::now()->toDateString();
    
        // Ambil data jadwal
        $dos = DaftarkelasModel::join('dosen', function ($join) use ($dosenId, $currentDay) {
            $join->on('daftarkelas_models.dosen_id', '=', 'dosen.id')
                ->where('dosen.id', $dosenId)
                ->where('daftarkelas_models.hari', $currentDay);
        })
            ->select('daftarkelas_models.*')
            ->distinct()
            ->get();
    
        // Ambil data keterangan
        $keterangan = KeteranganGuruModel::where('dosen_id', $dosenId)
            ->whereDate('tanggal', $currentDate)
            ->get();
    
        // Ambil data absensi
        // $absensi = AbsensiModel::where('progdi_id', Auth::user()->dosen['progdi_id'])
        //     ->whereDate('created_at', $currentDate)
        //     ->get();
        $absensi = AbsensiModel::where('progdi_id', $progdiId)
        ->where('kelas_id', $kelasId)
        ->whereDate('created_at', $currentDate)
        ->get();
    
        $pdf = PDF::loadView('pdf.jadwal', [
            'dos' => $dos,
            'keterangan' => $keterangan,
            'absensi' => $absensi,
            'currentDay' => $currentDay,
            'currentDate' => $currentDate,
        ]);
    
        return $pdf->download('laporan_perkuliahan_' . Carbon::now()->format('Y_m_d') . '.pdf');
    }
    
}
