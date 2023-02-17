<?php

namespace App\Http\Controllers;

use App\Models\Master\KrsModel;
use App\Models\Master\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $data['krs'] = KrsModel::all();
            $data['mhs'] = MahasiswaModel::all();
            $data['krs'] = KrsModel::join('mahasiswa', 'krs.mahasiswa_id', '=', 'mahasiswa.id')
            ->select('krs.*', 'mahasiswa.nama')
            ->get();
            return view('pages.dashboard.dashboardadmin', $data);
        } elseif (Auth::user()->role_id == 1) {
            return view('pages.dashboard.dashboarddosen');
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

