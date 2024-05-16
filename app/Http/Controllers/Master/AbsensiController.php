<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\AbsensiModel;
use App\Models\Master\MahasiswaModel;
use App\Models\Master\JadwalkelasModel;
use App\Models\Master\MatakuliahModel;
use App\Models\Master\ProgdiModel;
use App\Models\Master\KelasModel;
use App\Models\Master\RuangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Query\Exception;

use Carbon\Carbon;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role_id;
        $data = []; // Inisialisasi $data sebagai array kosong

        if ($userRole == 0 || Auth::user()->id == 1) {
            $absen = AbsensiModel::all();
            $data['absen'] = $absen;
        } elseif (Auth::user()->role_id == 1) {
            $absen = AbsensiModel::all();
            $dosenProgdi = Auth::user()->dosen['progdi_id'];
            $dosenKelas = Auth::user()->dosen['kelas_id'];
            $absen = AbsensiModel::join('dosen', function ($join) use ($dosenProgdi, $dosenKelas) {
                $join->on('absensis.progdi_id', '=', 'dosen.progdi_id')
                    ->on('absensis.kelas_id', '=', 'dosen.kelas_id')
                    ->where('dosen.kelas_id', $dosenKelas)
                    ->where('absensis.progdi_id', $dosenProgdi);
            })
                ->distinct()
                ->get();

            $data['absen'] = $absen;
        } else {
            $mahasiswaNim = Auth::user()->mahasiswa['nim'];
            $absen = AbsensiModel::join('mahasiswa', function ($join) use ($mahasiswaNim) {
                $join->on('absensis.kode_absen', '=', 'mahasiswa.nim')
                    ->where('absensis.kode_absen', $mahasiswaNim); // Menyesuaikan dengan hari berjalan
            })
                ->distinct() // Hanya ambil hasil unik
                ->get();

            $data['absen'] = $absen;
        }

        return view('pages.absen.absen', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mendapatkan peran pengguna yang sedang masuk
        $userRole = Auth::user()->role_id;

        $data['progdi'] = ProgdiModel::get();
        $data['mahasiswa'] = MahasiswaModel::get();
        $data['kelas'] = KelasModel::get();

        if ($userRole == 0) {
            return view('pages.absen.tambahabsen', $data);
        } elseif ($userRole == 1) {
            return view('pages.absen.tambahabsendosen', $data);
        } else {
            return view('pages.absen.tambahabsensiswa', $data);
        }
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
            'kode_absen' => 'required',
            'progdi' => 'required',
            'mahasiswa' => 'required',
            'kelas' => 'required',
            'status' => 'required',
            'hari' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // Ambil tanggal saat ini menggunakan Carbon
        $hari = Carbon::now()->toDateString();

        // Cek apakah sudah ada absensi untuk mahasiswa tertentu pada tanggal ini
        $existingAbsensi = AbsensiModel::where('mahasiswa_id', $request->mahasiswa)
            ->where('hari', $hari)
            ->exists();

        if ($existingAbsensi) {
            return redirect('/absensi')->with('error', 'Kamu sudah absen hari ini.');
        }

        // Jika belum ada absensi untuk mahasiswa tertentu pada tanggal ini, simpan data absensi baru
        AbsensiModel::create([
            'uid' => Str::uuid(),
            'kode_absen' => $request->kode_absen,
            'progdi_id' => $request->progdi,
            'kelas_id' => $request->kelas,
            'mahasiswa_id' => $request->mahasiswa,
            'status_absensi' => $request->status,
            'hari' => $hari, // Menggunakan tanggal saat ini
        ]);

        return redirect('/absensi')->with('success', 'Berhasil tambah data');
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
        $data['mahasiswa'] = MahasiswaModel::get();
        $data['kelas'] = KelasModel::get();
        $data['absen'] = AbsensiModel::where('uid', $id)->first();
        return view('pages.absen.editabsen', $data);
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
            'kode_absen' => 'required',
            'progdi' => 'required',
            'kelas' => 'required',
            'mahasiswa' => 'required',
            'status' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        AbsensiModel::where('uid', $id)->update([
            'kode_absen' => $request->kode_absen,
            'progdi_id' => $request->progdi,
            'mahasiswa_id' => $request->mahasiswa,
            'kelas_id' => $request->kelas,
            'status_absensi' => $request->status,

        ]);
        return redirect('/absensi')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AbsensiModel::where('uid', $id)->delete();
        return redirect('/absensi');
    }
    public function getkelas(Request $request)
    {
        $avlb = JadwalkelasModel::where('semester', $request->semester)->get();
        $kls = [];
        foreach ($avlb as $key => $value) {
            $kls[] = $value->kelas_id;
        }

        return AbsensiModel::where('semester', $request->semester)->whereNotIn('id', $kls)->get();
    }
    public function searchAbsensi(Request $request)
    {
        $search = $request->input('search');
        $kelas = AbsensiModel::all();
        $result = [];

        foreach ($kelas as $item) {
            if (
                stripos($item->kode_absen, $search) !== false ||
                $item->progdi == $search ||
                $item->kelas == $search ||
                $item->mahasiswa == $search ||
                stripos($item->hari, $search) !== false
            ) {
                $result[] = $item;
            }
        }

        return response()->json($result);
    }
}
