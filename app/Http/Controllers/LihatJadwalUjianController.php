<?php

namespace App\Http\Controllers;
use App\Models\Master\JadwalujianModel;

use Illuminate\Http\Request;

class LihatJadwalUjianController extends Controller
{
    public function index()
    {
        $data['jadwalujians'] = JadwalujianModel::get();
        return view('pages.lihatjadwalujian.lihatjadwalujian',$data);
    }
}
