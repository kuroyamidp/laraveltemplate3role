<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Master\MatakuliahModel;
use App\Models\Master\NilaiUjianModel;
use App\Models\Master\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class NilaiUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // $coba
        //   $nilai = NilaiUjianModel:: select("*","mahasiswa.nim","mahasiswa.nama")->leftJoin("mahasiswa","mahasiswa.id","=","nilai_ujian_models.id")->get();
            
        //   $data = [];
         
        //   foreach ($nilai as $item) {
        //       // $coba=explode(",", $item->jadwal_id);
        //       $coba= json_decode($item->jadwal_id);
  
             
  
        //       $item->daftar_jadwal=MatakuliahModel::whereIn("id",$coba)->get();
        //       // $data[] = [
        //       //     'mahasiswa_id' => $item->mahasiswa_id,
        //       //     'nama' => $item->matkul ? $item->matkul->nama : '',
        //       //     'sks' => $item->matkul ? $item->matkul->sks : '',
        //       //     'semester' => $item->semester,
        //       // ];
        //   }
        //   $data = [
        //       "krs" => $nilai
        //   ];
        //   return $nilai;
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

    
        $data['matkul'] = MatakuliahModel::get();
        $data['mhs'] = MahasiswaModel::get();
    
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
            'mahasiswa_id' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        NilaiUjianModel::create([
            'mahasiswa_id' => $request->mahasiswa_id,
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
        //
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
            'mahasiswa_id' => 'required',
            'mata_kuliah' => 'required',
            'nilai' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        NilaiUjianModel::where('uid', $id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'matkul_id' => $request->mata_kuliah,
            'nilai' => $request->nilai,
        ]);
        return redirect('/nilaiujian')->with('success', 'Berhasil tambah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
