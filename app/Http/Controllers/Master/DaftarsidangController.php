<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Models\Master\DaftarsidangModel;
use App\Http\Controllers\Controller;
use App\Models\Master\JadwalkelasModel;
use App\Models\Master\KrsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class DaftarsidangController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['daftarsidangs'] = DaftarsidangModel::get();
        return view('pages.daftarsidang.lihatsidang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.daftarsidang.tambahsidang');
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
            'npm' => 'required',
            'nama' => 'required',
            'tanggal_sidang' => 'required',
            'jam' =>'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        DaftarSidangModel::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'tanggal_sidang' => Carbon::parse($request->tanggal_sidang)->format('Y-m-d'),
            'jam' => $request->jam,
        ]);

        return redirect('/daftarsidang')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['daftarsidangs'] = DaftarSidangModel::get();
        return view('pages.daftarsidang.daftarsidang', $data);
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'npm' => 'required',
            'tanggal_sidang' => 'required',
            'jam' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        DaftarsidangModel::where('nama', $id)->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'tanggal_sidang' => $request->tanggal_sidang,
            'jam' => $request->jam,
        ]);

        return redirect('/daftarsidang')->with('success', 'Berhasil update data');
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