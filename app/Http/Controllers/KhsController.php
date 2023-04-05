<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\NilaiUjianModel;
use Illuminate\Support\Facades\Auth;
use PDF;


class KhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Auth::user()->mahasiswa;
        // return $mhs;

        $data['nilaiujian'] = NilaiUjianModel::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();
        return view('pages.lihatkhs.lihatkhs', $data);
    }


    public function cetaknilaiujian()
    {
        $data = NilaiUjianModel::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();
        // return $data;
        view()->share('data', $data);
        $pdf = PDF::loadview('pages.nilaiujian.cetaknilaiujian');
        return $pdf->download('KHS.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}

