<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Imports\DataMahasiswaImport;
use App\Models\Master\MahasiswaModel;
use App\Models\Master\ProgdiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProfilemhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $data['mahasiswa'] = MahasiswaModel::where('user_id', $user->id)->get();
        return view('pages.mahasiswa.profile.profileuser', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['progdi'] = ProgdiModel::get();
        return view('pages.mahasiswa.tambahmahasiswa', $data);
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
                    'nama' => 'required',
                    'nim' => 'required',
                    'jenis_kelamin' => 'required',
                    'perguruan_tinggi' => 'required',
                    'semester_awal' => 'required',
                    'status_awal' => 'required',
                    'status' => 'required',
                    'semester_berjalan' => 'required|min:1|max:20',
                    'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);

                // response error validation
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
                }
                $name = $request->file('foto')->getClientOriginalName();
                $filename = time() . '-' . $name;
                $file = $request->file('foto');
                $file->move(public_path('Image'), $filename);

                MahasiswaModel::where('uid', $request->uid)->update([
                    'progdi_id' => $request->progdi,
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'perguruan_tinggi' => $request->perguruan_tinggi,
                    'semester_awal' => $request->semester_awal,
                    'status_mahasiswa' => $request->status_awal,
                    'status' => $request->status,
                    'image' => $filename,
                    'semester_berjalan' => $request->semester_berjalan,
                ]);
                return redirect('/mahasiswa')->with('success', 'Berhasil edit data');
            } else {
                $validator = Validator::make($request->all(), [
                    'progdi' => 'required',
                    'nama' => 'required',
                    'nim' => 'required',
                    'jenis_kelamin' => 'required',
                    'perguruan_tinggi' => 'required',
                    'semester_awal' => 'required',
                    'status_awal' => 'required',
                    'status' => 'required',
                    'semester_berjalan' => 'required|min:1|max:20',
                ]);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
                }

                MahasiswaModel::where('uid', $request->uid)->update([
                    'progdi_id' => $request->progdi,
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'perguruan_tinggi' => $request->perguruan_tinggi,
                    'semester_awal' => $request->semester_awal,
                    'status_mahasiswa' => $request->status_awal,
                    'status' => $request->status,
                    'semester_berjalan' => $request->semester_berjalan,
                ]);
                return redirect('/mahasiswa')->with('success', 'Berhasil edit data');
            }
        } else {
            $validator = Validator::make($request->all(), [
                'progdi' => 'required',
                'nama' => 'required',
                'nim' => 'required',
                'jenis_kelamin' => 'required',
                'perguruan_tinggi' => 'required',
                'semester_awal' => 'required',
                'status_awal' => 'required',
                'status' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
                'semester_berjalan' => 'required|min:1|max:20',
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

                MahasiswaModel::create([
                    'uid' => Str::uuid(),
                    'progdi_id' => $request->progdi,
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'perguruan_tinggi' => $request->perguruan_tinggi,
                    'semester_awal' => $request->semester_awal,
                    'status_mahasiswa' => $request->status_awal,
                    'status' => $request->status,
                    'image' => $filename,
                    'semester_berjalan' => $request->semester_berjalan,
                ]);
                return redirect('/mahasiswa')->with('success', 'Berhasil tambah data');
            } else {
                MahasiswaModel::create([
                    'uid' => Str::uuid(),
                    'progdi_id' => $request->progdi,
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'perguruan_tinggi' => $request->perguruan_tinggi,
                    'semester_awal' => $request->semester_awal,
                    'status_mahasiswa' => $request->status_awal,
                    'status' => $request->status,
                    'semester_berjalan' => $request->semester_berjalan,
                ]);
                return redirect('/mahasiswa')->with('success', 'Berhasil tambah data');
            }
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
        $data['mahasiswa'] = MahasiswaModel::where('uid', $id)->first();
        $data['progdi'] = ProgdiModel::get();
        return view('pages.mahasiswa.editmahasiswa', $data);
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
        MahasiswaModel::where('uid', $id)->delete();
        return redirect('/mahasiswa');
    }

    public function importdatamahasiswa(Request $request)
    {
        $reqarr = Excel::toCollection(new DataMahasiswaImport, $request->file('excel_file'));
        // return $reqarr;
        foreach ($reqarr as $key => $value) {
            foreach ($value as $j => $val) {
                if ($j > 1) {
                    // return $val;
                    if ($val[7] == 'NON AKTIF') {
                        if ($val[3] == 'PEREMPUAN') {
                            MahasiswaModel::create([
                                'uid' => Str::uuid(),
                                'nim' => $val[1],
                                'nama' => $val[2],
                                'jenis_kelamin' => 2,
                                'perguruan_tinggi' => $val[4],
                                'semester_awal' => $val[5],
                                'status_mahasiswa' => $val[6],
                                'status' => 0,
                                'semester_berjalan' => $val[8]
                            ]);
                        } else {
                            MahasiswaModel::create([
                                'uid' => Str::uuid(),
                                'nim' => $val[1],
                                'nama' => $val[2],
                                'jenis_kelamin' => 1,
                                'perguruan_tinggi' => $val[4],
                                'semester_awal' => $val[5],
                                'status_mahasiswa' => $val[6],
                                'status' => 0,
                                'semester_berjalan' => $val[8]
                            ]);
                        }
                    } else if ($val[7] == 'AKTIF') {
                        if ($val[3] == 'PEREMPUAN') {
                            MahasiswaModel::create([
                                'uid' => Str::uuid(),
                                'nim' => $val[1],
                                'nama' => $val[2],
                                'jenis_kelamin' => 2,
                                'perguruan_tinggi' => $val[4],
                                'semester_awal' => $val[5],
                                'status_mahasiswa' => $val[6],
                                'status' => 1,
                                'semester_berjalan' => $val[8]
                            ]);
                        } else {
                            MahasiswaModel::create([
                                'uid' => Str::uuid(),
                                'nim' => $val[1],
                                'nama' => $val[2],
                                'jenis_kelamin' => 1,
                                'perguruan_tinggi' => $val[4],
                                'semester_awal' => $val[5],
                                'status_mahasiswa' => $val[6],
                                'status' => 1,
                                'semester_berjalan' => $val[8]
                            ]);
                        }
                    } else {
                        if ($val[3] == 'PEREMPUAN') {
                            MahasiswaModel::create([
                                'uid' => Str::uuid(),
                                'nim' => $val[1],
                                'nama' => $val[2],
                                'jenis_kelamin' => 2,
                                'perguruan_tinggi' => $val[4],
                                'semester_awal' => $val[5],
                                'status_mahasiswa' => $val[6],
                                'status' => 2,
                                'semester_berjalan' => $val[8]
                            ]);
                        } else {
                            MahasiswaModel::create([
                                'uid' => Str::uuid(),
                                'nim' => $val[1],
                                'nama' => $val[2],
                                'jenis_kelamin' => 1,
                                'perguruan_tinggi' => $val[4],
                                'semester_awal' => $val[5],
                                'status_mahasiswa' => $val[6],
                                'status' => 2,
                                'semester_berjalan' => $val[8]
                            ]);
                        }
                    }
                }
            }
        }
        return redirect('/mahasiswa')->with('success', 'Berhasil upload data mahasiswa');
    }
}
