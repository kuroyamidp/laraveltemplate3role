<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\DaftarkelasModel;
use App\Models\Master\JadwalkelasModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class JadwalkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->bulan && $request->tingkat) {
            // return "hello";
            // return Carbon::parse($request->bulan)->format('m');
            $jdw = JadwalkelasModel::whereMonth('periode', Carbon::parse($request->bulan)->format('m'))->whereYear('periode', Carbon::parse($request->bulan)->format('Y'))->where('semester', $request->tingkat)->get();
            $check = [];
            foreach ($jdw as $key => $value) {
                $check[$value->hari][] = $value;
            }
            // return $check;
            $data['jdw'] = $check;
            return view('pages.jadwalkelas.jadwal', $data);
        }
        $jdw = JadwalkelasModel::get();
        $check = [];
        foreach ($jdw as $key => $value) {
            $check[$value->hari][] = $value;
        }
        // return $check;
        $data['jdw'] = $check;
        return view('pages.jadwalkelas.jadwal', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jadwalkelas.tambahjadwal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'periode' => 'required',
            'hari' => 'required',
            'semester' => 'required',
            'kelas' => 'required',

        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        foreach ($request->kelas as $value) {
            JadwalkelasModel::create([
                'uid' => Str::uuid(),
                'kelas_id' => $value,
                'hari' => $request->hari,
                'semester' => $request->semester,
                'periode' => Carbon::parse($request->periode)->format('Y-m-d'),
            ]);
        }
        return redirect('/jadwal-kelas')->with('success', 'Berhasil tambah jadwal kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['jdwl'] = JadwalkelasModel::where('uid', $id)->first();
        $avlb = JadwalkelasModel::where('semester', $data['jdwl']['semester'])->get();
        $kls = [];
        foreach ($avlb as $key => $value) {
            $kls[] = $value->kelas_id;
        }
        $data['kls'] = DaftarkelasModel::where('semester', $data['jdwl']['semester'])->whereNotIn('id', $kls)->get();
        // $data['kls'] = $kls;
        // return $data;
        return view('pages.jadwalkelas.editjadwal', $data);
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
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'periode' => 'required',
            'hari' => 'required',
            'semester' => 'required',
            'kelas' => 'required',

        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        JadwalkelasModel::where('uid', $id)->update([
            'kelas_id' => $request->kelas,
            'hari' => $request->hari,
            'semester' => $request->semester,
            'periode' => Carbon::parse($request->periode)->format('Y-m-d'),
        ]);
        return redirect('/jadwal-kelas')->with('success', 'Berhasil update jadwal kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JadwalkelasModel::where('uid', $id)->delete();
        return redirect('/jadwal-kelas');
    }

}