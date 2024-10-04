<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Imports\RuangkelasImport;
use App\Models\Master\RuangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class RuangkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ruang'] = RuangModel::get();
        return view('pages.ruangkelas.ruangkelas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ruangkelas.tambahruangkelas');
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
            'kode_ruang' => 'required',
            'nama_ruang' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        RuangModel::create([
            'uid' => Str::uuid(),
            'kode_ruang' => $request->kode_ruang,
            'nama' => $request->nama_ruang,
            'status' => 0,
        ]);
        return redirect('/ruangkelas')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['ruang'] = RuangModel::where('uid', $id)->first();
        return view('pages.ruangkelas.editruangkelas', $data);
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
            'kode_ruang' => 'required',
            'nama_ruang' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        RuangModel::where('uid', $id)->update([
            'kode_ruang' => $request->kode_ruang,
            'nama' => $request->nama_ruang,
        ]);
        return redirect('/ruangkelas')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RuangModel::where('uid', $id)->delete();
        return redirect('/ruangkelas');
    }

    public function importkelas(Request $request)
    {
        $reqarr = Excel::toCollection(new RuangkelasImport, $request->file('excel_file'));

        // return $reqarr;

        foreach ($reqarr as $key => $value) {
            foreach ($value as $j => $val) {
                if ($j > 1) {
                    // return $val[1];
                    RuangModel::create([
                        'uid' => Str::uuid(),
                        'kode_ruang' => $val[1],
                        'nama' => $val[2],
                        'status' => 0,
                    ]);
                }
            }
        }

        return redirect('/ruangkelas')->with('success', 'Berhasil upload data ruang kelas');
    }
}
