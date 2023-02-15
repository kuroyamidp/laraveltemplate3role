<?php

namespace App\Http\Controllers;

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
            return view('pages.dashboard.dashboardadmin');
        } elseif (Auth::user()->role_id == 1) {
            return view('pages.dashboard.dashboarddosen');
        } else {
            //  return Auth::user()->mahasiswa['semester_berjalan'];
            return view('pages.dashboard.dashboardmahasiswa');
        }
    }
}
