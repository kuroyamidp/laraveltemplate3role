<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\AbsensiModel;
use App\Models\Master\MahasiswaModel;
use App\Models\Master\DosenModel;
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
        $data['absen'] = AbsensiModel::all();
        return view('pages.absen.absen', $data);
        $userId = Auth::id(); 
        $userRole = Auth::user()->role_id;
        $data = [];
        
        if ($userRole == 0 || $userRole == 1) {
            if ($userRole == 1) {
                // Mendapatkan dosen dengan progdi_id dan kelas_id terkait dosen yang sedang masuk
                $dosen = DosenModel::where('user_id', $userId)->first(); // Asumsikan DosenModel terkait dengan user_id
                // Pastikan dosen ditemukan sebelum query
                if ($dosen) {
                    $absen = AbsensiModel::where('progdi_id', $dosen->progdi_id)
                                         ->where('kelas_id', $dosen->kelas_id)
                                         ->get();
                    $data['absen'] = $absen; // Menyimpan data absensi ke dalam $data
                } else {
                    $data['absen'] = []; // Jika tidak ada dosen terkait, kosongkan data absensi
                }
            } else {
                // Admin (role 0) dapat melihat semua data absensi
                $absen = AbsensiModel::all(); 
                $data['absen'] = $absen;
            }
        } else {
            // Jika pengguna memiliki peran selain "0" (admin) dan "1" (dosen), diasumsikan sebagai mahasiswa
            $mahasiswaNim = Auth::user()->mahasiswa['nim']; // Mendapatkan NIM mahasiswa yang sedang masuk
            $absen = AbsensiModel::join('mahasiswa', 'absensis.kode_absen', '=', 'mahasiswa.nim')
            ->select('absensis.image as absensi_image', 'mahasiswa.image as mahasiswa_image', 'absensis.*', 'mahasiswa.*')
            ->where('absensis.kode_absen', $mahasiswaNim)
            ->distinct()
            ->get();        
    
            $data['absen'] = $absen; // Menyimpan data absensi ke dalam $data
        }
        
        return view('pages.absen.absen', $data); // Menampilkan halaman absen dengan data yang telah diambil
        
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
            return view('pages.absen.tambahabsen', $data);
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
            'latitude' => 'required',
            'longitude' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // Check if there is a file uploaded
        if ($request->hasFile('foto')) {
            $name = $request->file('foto')->getClientOriginalName();
            $filename = time() . '-' . $name;
            $file = $request->file('foto');
            $file->move(public_path('Image'), $filename);
        }
        // Ambil tanggal saat ini menggunakan Carbon
        $hari = Carbon::now();

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
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => isset($filename) ? $filename : null,

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
            'status' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    
        $absensi = AbsensiModel::where('uid', $id)->first();
    
        // Check if there is a file uploaded
        if ($request->hasFile('foto')) {
            // Delete old file if it exists
            if ($absensi->image && file_exists(public_path('Image/'.$absensi->image))) {
                unlink(public_path('Image/'.$absensi->image));
            }
    
            $name = $request->file('foto')->getClientOriginalName();
            $filename = time() . '-' . $name;
            $file = $request->file('foto');
            $file->move(public_path('Image'), $filename);
    
            // Update image
            $absensi->image = $filename;
        }
    
        $absensi->kode_absen = $request->kode_absen;
        $absensi->progdi_id = $request->progdi;
        $absensi->mahasiswa_id = $request->mahasiswa;
        $absensi->kelas_id = $request->kelas;
        $absensi->status_absensi = $request->status;
    
        $absensi->save();
    
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
                $item->image == $search ||
                stripos($item->hari, $search) !== false
            ) {
                $result[] = $item;
            }
        }

        return response()->json($result);
    }
}
