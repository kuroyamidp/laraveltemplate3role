<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\MatakuliahModel;
use App\Models\Master\NilaiUjianModel;
use App\Models\Master\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class NilaiUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['nilaiujian'] = NilaiUjianModel::get();
        return view('pages.nilaiujian.nilaiujian', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['mahasiswa'] = MahasiswaModel::get();
        $data['matkul'] = MatakuliahModel::get();
        return view('pages.nilaiujian.tambahnilaiujian', $data);
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
            'mahasiswa' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        NilaiUjianModel::create([
            'mahasiswa_id' => $request->mahasiswa,
            'matkul_id' => $request->mata_kuliah,
            'nilai' => $request->nilai,
        ]);
        return redirect('/nilaiujian')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['matkul'] = MatakuliahModel::get();
        $data['mahasiswa'] = MahasiswaModel::get();
        $data['nilaiujian'] = NilaiUjianModel::where('id', $id)->first();
        return view('pages.nilaiujian.editnilaiujian', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
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
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'mahasiswa' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        NilaiUjianModel::where('id', $id)->update([
            'mahasiswa_id' => $request->mahasiswa,
            'matkul_id' => $request->mata_kuliah,
            'nilai' => $request->nilai,
        ]);
        return redirect('/nilaiujian')->with('success', 'Berhasil Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NilaiUjianModel::where('id', $id)->delete();
        return redirect('/nilaiujian');
    }
}