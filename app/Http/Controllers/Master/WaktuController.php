<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\WaktuModel;
use App\Http\Controllers\Controller;
use App\Models\Master\DaftarkelasModel;
use App\Models\Master\DosenModel;
use App\Models\Master\JadwalkelasModel;
use App\Models\Master\ProgdiModel;
use App\Models\Master\KelasModel;
use App\Models\Master\RuangModel;
use Faker\ORM\CakePHP\Populator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class WaktuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['waktu'] = WaktuModel::get();
        // return $data;
        return view('pages.waktu.waktu', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.waktu.tambahwaktu');
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
            'jam' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        waktuModel::create([
            'uid' => Str::uuid(),
            'kode_waktu' => $request->kode,
            'jam' => $request->jam,
        ]);

        return redirect('/waktu')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['waktu'] = waktuModel::where('uid', $id)->first();
        return view('pages.waktu.editwaktu', $data);
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
            'jam' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        waktuModel::where('uid', $id)->update([
            'kode_waktu' => $request->kode,
            'jam' => $request->jam,
        ]);

        return redirect('/waktu')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        waktuModel::where('uid', $id)->delete();
        return redirect('/waktu');
    }
}
