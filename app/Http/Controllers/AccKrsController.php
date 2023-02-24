<?php

namespace App\Http\Controllers;

use App\Models\Master\KrsModel;
use App\Models\Master\MahasiswaModel;
use App\Models\Master\JadwalkelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccKrsController extends Controller
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
            $krs = KrsModel:: select("*","mahasiswa.nim","mahasiswa.nama")->leftJoin("mahasiswa","mahasiswa.id","=","krs.mahasiswa_id")->get();
       
         $data = [];
         foreach ($krs as $item) {
             // $coba=explode(",", $item->jadwal_id);
             $coba= json_decode($item->jadwal_id);
 
            
 
             $item->daftar_jadwal=JadwalkelasModel::whereIn("id",$coba)->get();
             // $data[] = [
             //     'mahasiswa_id' => $item->mahasiswa_id,
             //     'nama' => $item->matkul ? $item->matkul->nama : '',
             //     'sks' => $item->matkul ? $item->matkul->sks : '',
             //     'semester' => $item->semester,
             // ];
         }
         $data = [
             "krs" => $krs
         ];
            return view('pages.acckrs.acckrs', $data);
        } elseif (Auth::user()->role_id == 1) {
            return view('pages.acckrs.acckrs');
        } else {
            //  return Auth::user()->mahasiswa['semester_berjalan'];
            return view('pages.dashboard.dashboardmahasiswa');
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

