<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Imports\DataMatkulImport;
use App\Models\Master\MatakuliahModel;
use Illuminate\Http\Request;
use App\Models\Master\MahasiswaModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LihatJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['matkul'] = MatakuliahModel::get();
        return view('pages.lihatjadwal.lihatjadwal', $data);
    }
    public function cetaklihatjadwal()
    {
        $data = MatakuliahModel::all();
        view()->share('data', $data);
        $pdf= PDF::loadview('pages.lihatjadwal.cetakjadwal');
        return $pdf->download('Seluruh Mata Kuliah.pdf');
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
            'sks' => 'required|numeric',
            'bobot' => 'required|numeric',
            'mutu' => 'required|numeric',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        MatakuliahModel::create([
            'uid' => Str::uuid(),
            'kode_mk' => $request->kode,
            'nama' => $request->mata_kuliah,
            'sks' => $request->sks,
            'bobot' => $request->bobot,
            'mutu' => $request->mutu,
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
            'sks' => 'required|numeric',
            'bobot' => 'required|numeric',
            'mutu' => 'required|numeric',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        MatakuliahModel::where('uid', $id)->update([
            'kode_mk' => $request->kode,
            'nama' => $request->mata_kuliah,
            'sks' => $request->sks,
            'bobot' => $request->bobot,
            'mutu' => $request->mutu,
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
                        'sks' => $val[3],
                        'bobot' => $val[4],
                        'mutu' => $val[3] * $val[4],
                    ]);
                }
            }
        }
        return redirect('/matakuliah')->with('success', 'Berhasil upload data mata kuliah');
    }
}   