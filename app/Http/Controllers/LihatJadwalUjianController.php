<?php

namespace App\Http\Controllers;
use App\Models\Master\JadwalujianModel;
use Illuminate\Http\Request;
use PDF;

class LihatJadwalUjianController extends Controller
{
    public function index()
    {
        $data['jadwalujians'] = JadwalujianModel::get();
        return view('pages.lihatjadwalujian.lihatjadwalujian',$data);
    }
    
    public function cetakjadwalujian()
    {
        $data = JadwalujianModel::all();
        // return $data;
        view()->share('data', $data);
        $pdf = PDF::loadview('pages.lihatjadwalujian.cetakjadwalujian');
        return $pdf->download('Jadwal Ujian.pdf');
    }
}

