<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Imports\DataMahasiswaImport;
use App\Models\Master\MahasiswaModel;
use App\Models\Master\ProgdiModel;
use App\Models\Master\KelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mahasiswa'] = MahasiswaModel::get();
        return view('pages.mahasiswa.mahasiswa', $data);
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
                    'nis' => 'required',
                    'nim' => 'required',
                    'jenis_kelamin' => 'required',
                    'kelas' => 'required',
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

                MahasiswaModel::where('uid', $request->uid)->update([
                    'progdi_id' => $request->progdi,
                    'nis' => $request->nis,
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'perguruan_tinggi' => 'SMK N 5 KENDAL', // Assign fixed value here
                    'semester_id' => $request->kelas,
                    'image' => isset($filename) ? $filename : null,
                ]);
                return redirect('mahasiswa')->with('success', 'Berhasil tambah data');
            } else {
                $validator = Validator::make($request->all(), [
                    'progdi' => 'required',
                    'nama' => 'required',
                    'nis' => 'required',
                    'nim' => 'required',
                    'jenis_kelamin' => 'required',
                    'kelas' => 'required',
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

                MahasiswaModel::where('uid', $request->uid)->update([
                    'progdi_id' => $request->progdi,
                    'nis' => $request->nis,
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'perguruan_tinggi' => 'SMK N 5 KENDAL', // Assign fixed value here
                    'semester_id' => $request->kelas,
                ]);
                return redirect('mahasiswa')->with('success', 'Berhasil Edit data');
            }
        } else {

            $validator = Validator::make($request->all(), [
                'progdi' => 'required',
                'nama' => 'required',
                'nis' => 'required',
                'nim' => 'required',
                'jenis_kelamin' => 'required',
                'kelas' => 'required',
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


            MahasiswaModel::create([
                'uid' => Str::uuid(),
                'progdi_id' => $request->progdi,
                'nis' => $request->nis,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'perguruan_tinggi' => 'SMK N 5 KENDAL', // Assign fixed value here
                'semester_id' => $request->kelas,
                'image' => isset($filename) ? $filename : null,
            ]);
            return redirect('mahasiswa')->with('success', 'Berhasil tambah data');
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
        $data['kelas'] = KelasModel::get();
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
    public function searchMahasiswa(Request $request)
    {
        $search = $request->input('search');
        $kelas = MahasiswaModel::all();
        $result = [];

        foreach ($kelas as $item) {
            if (
                stripos($item->nim, $search) !== false ||
                $item->progdi == $search ||
                $item->kelas == $search ||
                $item->nama == $search ||
                stripos($item->nis, $search) !== false
            ) {
                $result[] = $item;
            }
        }

        return response()->json($result);
    }
}
