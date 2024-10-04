<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\MahasiswaModel;
use App\Models\Master\ProgdiModel;
use App\Models\Master\KelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data['mahasiswa'] = MahasiswaModel::get();
        return view('pages.mahasiswa.mahasiswa', $data);
    }

    public function create()
    {
        $data['progdi'] = ProgdiModel::get();
        $data['kelas'] = KelasModel::get();
        return view('pages.mahasiswa.tambahmahasiswa', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'progdi' => 'required',
            'nama' => 'required',
            'nis' => 'required',
            'nim' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    
        // Check if it's an update or a new record
        if ($request->uid) {
            $mahasiswa = MahasiswaModel::where('uid', $request->uid)->first();
    
            // Process image upload if exists
            if ($request->hasFile('foto')) {
                $name = $request->file('foto')->getClientOriginalName();
                $filename = time() . '-' . $name;
                $file = $request->file('foto');
                $file->move(public_path('Image'), $filename);
            } else {
                $filename = $mahasiswa->image; // Retain the existing image if not replaced
            }
    
            // Update existing mahasiswa
            $mahasiswa->update([
                'progdi_id' => $request->progdi,
                'nis' => $request->nis,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'perguruan_tinggi' => 'SMK N 5 KENDAL', // Fixed value
                'semester_id' => $request->kelas,
                'image' => $filename, // Use the new or existing image
            ]);
            
            return redirect('mahasiswa')->with('success', 'Berhasil Edit data');
        }else {
            MahasiswaModel::create([
                'uid' => Str::uuid(),
                'progdi_id' => $request->progdi,
                'nis' => $request->nis,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'perguruan_tinggi' => 'SMK N 5 KENDAL', // Fixed value
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
