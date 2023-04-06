<?php

namespace App\Http\Controllers;

use App\Models\JadwalujianModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\DaftarkelasModel;
use App\Models\Master\DosenModel;
use App\Models\Master\JadwalkelasModel;
use App\Models\Master\MatakuliahModel;
use App\Models\Master\RuangModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JadwalujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jadwalujians'] = JadwalujianModel::get();
        return view('pages.jadwalujian.jadwalujian',$data);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['dosen'] = DosenModel::get();
        $data['matkul'] = MatakuliahModel::get();
        $data['ruang'] = RuangModel::get();
        return view('pages.jadwalujian.tambahjadwalujian', $data);
    
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
            'mata_kuliah' => 'required',
            'ruang_kelas' => 'required',
            'dosen' => 'required',
            'jam' => 'required',
            'tanggal' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        JadwalujianModel::create([
            'matkul_id' => $request->mata_kuliah,
            'dosen_id' => $request->dosen,
            'ruang_id' => $request->ruang_kelas,
            'jam' => $request->jam, 
            'tanggal'=>$request->tanggal,
        ]);
        return redirect('/jadwalujian')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['dosen'] = DosenModel::get();
        $data['matkul'] = MatakuliahModel::get();
        $data['ruang'] = RuangModel::get();
        $data['jadwalujians'] = JadwalujianModel::where('id', $id)->first();
        return view('pages.jadwalujian.editjadwalujian', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['jadwalujians'] = JadwalujianModel::get();
        return view('pages.lihatjadwalujian.lihatjadwalujian',$data);
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
            'mata_kuliah' => 'required',
            'ruang_kelas' => 'required',
            'dosen' => 'required',
            'jam' => 'required',
            'tanggal' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        JadwalujianModel::where('id', $id)->update([
            'matkul_id' => $request->mata_kuliah,
            'dosen_id' => $request->dosen,
            'ruang_id' => $request->ruang_kelas,
            'jam' => $request->jam,
            'tanggal'=>$request->tanggal,
        ]);
        return redirect('/jadwalujian')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JadwalujianModel::where('id', $id)->delete();
        return redirect('/jadwalujian');
    }
}
