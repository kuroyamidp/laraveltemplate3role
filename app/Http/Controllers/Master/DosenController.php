<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Imports\DatadosenImport;
use App\Models\Master\DosenModel;
use App\Models\Master\ProgdiModel;
use App\Models\Master\KelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dosen'] = DosenModel::get();
        $data['kelas'] = KelasModel::get();
        return view('pages.dosen.dosen', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['progdi'] = ProgdiModel::get();
        $data['kelas'] = KelasModel::get();
        return view('pages.dosen.tambahdosen', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->uid) {
            if ($request->hasFile('foto')) {
                $validator = Validator::make($request->all(), [
                    'progdi' => 'required',
                    'kelas' => 'required',
                    'dosen' => 'required',
                    'nidn' => 'required',
                    'jenis_kelamin' => 'required',
                    'perguruan_tinggi' => 'required',
             
         
                    'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);

                // response error validation
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
                }

                if ($request->hasFile('foto')) {
                    $name = $request->file('foto')->getClientOriginalName();
                    $filename = time() . '-' . $name;
                    $file = $request->file('foto');
                    $file->move(public_path('Image'), $filename);
                }

                DosenModel::where('uid', $request->uid)->update([
                    'progdi_id' => $request->progdi,
                    'nama' => $request->dosen,
                    'nidn' => $request->nidn,
                    'kelas_id' => $request->kelas,
                    'perguruan_tinggi' => 'SMK N 5 KENDAL',
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'jabatan_fungsional' => $request->jabatan_fungsional,
               
                 
                    'image' => isset($filename) ? $filename : null,
                ]);
                return redirect('dosen')->with('success', 'Berhasil tambah data');
            } else {
                $validator = Validator::make($request->all(), [
                    'progdi' => 'required',
                    'kelas' => 'required',
                    'dosen' => 'required',
                    'nidn' => 'required',
                    'jenis_kelamin' => 'required',
                 
                
                    'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);

                // response error validation
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
                }
    
                // Check if there is a file uploaded
                if ($request->hasFile('foto')) {
                    $name = $request->file('foto')->getClientOriginalName();
                    $filename = time() . '-' . $name;
                    $file = $request->file('foto');
                    $file->move(public_path('Image'), $filename);
                }

                DosenModel::where('uid', $request->uid)->update([
                    'progdi_id' => $request->progdi,
                    'kelas_id' => $request->kelas,
                    'nama' => $request->dosen,
                    'nidn' => $request->nidn,
                    'perguruan_tinggi' => 'SMK N 5 KENDAL',
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'jabatan_fungsional' => $request->jabatan_fungsional,
                 
                 
                ]);
                return redirect('dosen')->with('success', 'Berhasil Edit data');
            }
        } else {

            $validator = Validator::make($request->all(), [
                'progdi' => 'required',
                'kelas' => 'required',
                'dosen' => 'required',
                'nidn' => 'required',
                'jenis_kelamin' => 'required',
            
            
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048|required',
            ]);

            // response error validation
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            $name = $request->file('foto')->getClientOriginalName();
            $filename = time() . '-' . $name;
            $file = $request->file('foto');
            $file->move(public_path('Image'), $filename);


            DosenModel::create([
                'uid' => Str::uuid(),
                'progdi_id' => $request->progdi,
                'kelas_id' => $request->kelas,
                'nama' => $request->dosen,
                'nidn' => $request->nidn,
                'perguruan_tinggi' => 'SMK N 5 KENDAL',
                'jenis_kelamin' => $request->jenis_kelamin,
                'jabatan_fungsional' => $request->jabatan_fungsional,
               
                'image' => isset($filename) ? $filename : null,
            ]);
            return redirect('dosen')->with('success', 'Berhasil tambah data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['dosen'] = DosenModel::where('uid', $id)->first();
        $data['progdi'] = ProgdiModel::get();
        $data['kelas'] = KelasModel::get();
        return view('pages.dosen.editdosen', $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DosenModel::where('uid', $id)->delete();
        return redirect('/dosen');
    }
    public function searchDosen(Request $request)
    {
        $search = $request->input('search');
        $kelas = DosenModel::all();
        $result = [];

        foreach ($kelas as $item) {
            if (
                stripos($item->nidn, $search) !== false ||
                $item->progdi == $search ||
                $item->nama == $search ||
                $item->jabatan_fungsional == $search ||
                stripos($item->kelas, $search) !== false
            ) {
                $result[] = $item;
            }
        }

        return response()->json($result);
    }
    public function importdatadosen(Request $request)
    {
        $reqarr = Excel::toCollection(new DatadosenImport, $request->file('excel_file'));
        // return $reqarr;
        foreach ($reqarr as $key => $value) {
            foreach ($value as $j => $val) {
                if ($j > 0) {
                    if ($val[4] == 'LAKI-LAKI') {
                        DosenModel::create([
                            'uid' => Str::uuid(),
                            // 'progdi_id' => $request->progdi,
                            'nama' => $val[1],
                            'nidn' => $val[2],
                            'perguruan_tinggi' => $val[3],
                            'jenis_kelamin' => 1,
                            'jabatan_fungsional' => $val[5],
                            'pendidikan_tertinggi' => $val[6],
                            'ikatan_kerja' => $val[7],
                            'status' => $val[8],
                        ]);
                    } elseif ($val[4] == 'PEREMPUAN') {
                        DosenModel::create([
                            'uid' => Str::uuid(),
                            // 'progdi_id' => $request->progdi,
                            'nama' => $val[1],
                            'nidn' => $val[2],
                            'perguruan_tinggi' => $val[3],
                            'jenis_kelamin' => 2,
                            'jabatan_fungsional' => $val[5],
                            'pendidikan_tertinggi' => $val[6],
                            'ikatan_kerja' => $val[7],
                            'status' => $val[8],
                        ]);
                    }
                }
            }
        }
        return redirect('/dosen')->with('success', 'Berhasil upload data dosen');
    }
}
