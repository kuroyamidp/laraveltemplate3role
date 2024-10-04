<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Imports\DataMatkulImport;
use App\Models\KelasModel as ModelsKelasModel;
use App\Models\Master\KelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kelas'] = KelasModel::get();
        return view('pages.kelas.kelas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kelas.tambahkelas');
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
            'kelas' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        KelasModel::create([
            'uid' => Str::uuid(),
            'kode_kelas' => $request->kode,
            'nama' => $request->kelas,
        ]);

        return redirect('/kelas')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['kelas'] = KelasModel::where('uid', $id)->first();
        return view('pages.kelas.editkelas', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
       
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
            'kelas' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        KelasModel::where('uid', $id)->update([
            'kode_kelas' => $request->kode,
            'nama' => $request->kelas,
        ]);

        return redirect('/kelas')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KelasModel::where('uid', $id)->delete();
        return redirect('/kelas');
    }
}
