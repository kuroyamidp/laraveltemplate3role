<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Imports\DataMatkulImport;
use App\Models\Master\MatakuliahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['matkul'] = MatakuliahModel::get();
        return view('pages.matakuliah.matkul', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.matakuliah.tambahmatakuliah');
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
            'kode' => 'required',
            'mata_kuliah' => 'required',
        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // Check if kode_mk already exists
        $existingMatakuliah = MatakuliahModel::where('kode_mk', $request->kode)->first();
        if ($existingMatakuliah) {
            return Redirect::back()->withErrors(['kode' => 'Kode mata pelajaran sudah ada.'])->withInput();
        }

        MatakuliahModel::create([
            'uid' => Str::uuid(),
            'kode_mk' => $request->kode,
            'nama' => $request->mata_kuliah,
        ]);

        return redirect('/matakuliah')->with('success', 'Berhasil tambah data');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['matakuliah'] = MatakuliahModel::where('uid', $id)->first();
        return view('pages.matakuliah.editmatkul', $data);
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
            'kode' => 'required',
            'mata_kuliah' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        MatakuliahModel::where('uid', $id)->update([
            'kode_mk' => $request->kode,
            'nama' => $request->mata_kuliah,
        ]);

        return redirect('/matakuliah')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MatakuliahModel::where('uid', $id)->delete();
        return redirect('/matakuliah');
    }
    public function importdatamatkul(Request $request)
    {
        $reqarr = Excel::toCollection(new DataMatkulImport, $request->file('excel_file'));
        // return $reqarr;
        foreach ($reqarr as $key => $value) {
            foreach ($value as $j => $val) {
                if ($j > 1) {
                    // return $val[1];
                    MatakuliahModel::create([
                        'uid' => Str::uuid(),
                        'kode_mk' => $val[1],
                        'nama' => $val[2],
                    ]);
                }
            }
        }
        return redirect('/matakuliah')->with('success', 'Berhasil upload data mata kuliah');
    }
}
