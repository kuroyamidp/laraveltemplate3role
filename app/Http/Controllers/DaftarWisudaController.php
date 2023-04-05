<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\DaftarWisudaModel;
use App\Models\Master\KrsModel;
use App\Models\Master\MahasiswaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;
use DateTime;

class DaftarWisudaController extends Controller
{
    public function index()
    {
        $now = new DateTime();
        $month = $now->format('m'); // mengambil nilai bulan saat ini

        if (in_array($month, ['02', '03', '04'])) {  // jika bulan saat ini Februari
            $data['daftarwisuda'] = DaftarWisudaModel::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();
            return view('pages.daftarwisuda.daftarwisuda', $data);
        } else {
            return redirect()->route('home')->with('error', 'Maaf, belum waktunya.'); // atau redirect ke halaman lain dengan alert
        }
    }

    public function cetakdaftarwisuda()
    {
        $data = DaftarWisudaModel::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();
        view()->share('data', $data);
        $pdf = PDF::loadview('pages.daftarwisuda.cetakdaftarwisuda');
        return $pdf->download('Daftar_Wisuda.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['mahasiswa'] = MahasiswaModel::where('user_id', Auth::user()->id)->get();
        // return $data;
        return view('pages.daftarwisuda.tambahdaftarwisuda', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->uid) {
        //     if ($request->hasFile('file')) {
        //         $validator = Validator::make($request->all(), [
        //             'npm' => 'required',
        //             'nama' => 'required',
        //             'tanggal_sidang' => 'required',
        //             'jam' => 'required',
        //             'file' => 'required'
        //         ]);

        //         // response error validation
        //         if ($validator->fails()) {
        //             return Redirect::back()->withErrors($validator);
        //         }
        //         $name = $request->file('file')->getClientOriginalName();
        //         $filename = time() . '-' . $name;
        //         $file = $request->file('file');
        //         $file->move(public_path('Document'), $filename);

        //         DaftarSidangModel::where('id', $request->id)->update([
        //             'nama' => $request->nama,
        //             'npm' => $request->npm,
        //             'tanggal_sidang' => Carbon::parse($request->tanggal_sidang)->format('Y-m-d'),
        //             'jam' => $request->jam,
        //             'file' => $filename,
        //         ]);
        //         return redirect('/daftarsidang')->with('success', 'Berhasil edit data');
        //     } else {
        //         $validator = Validator::make($request->all(), [
        //             'npm' => 'required',
        //             'nama' => 'required',
        //             'tanggal_sidang' => 'required',
        //             'jam' => 'required',
        //         ]);
        //         if ($validator->fails()) {
        //             return Redirect::back()->withErrors($validator);
        //         }

        //         DaftarSidangModel::where('id', $request->id)->update([
        //             'nama' => $request->nama,
        //             'npm' => $request->npm,
        //             'tanggal_sidang' => Carbon::parse($request->tanggal_sidang)->format('Y-m-d'),
        //             'jam' => $request->jam,
        //         ]);
        //         return redirect('/daftarsidang')->with('success', 'Berhasil edit data');
        //     }
        // } else {
        //     $validator = Validator::make($request->all(), [
        //         'npm' => 'required',
        //         'nama' => 'required',
        //         'tanggal_sidang' => 'required',
        //         'jam' => 'required',
        //         'file' => 'required'
        //     ]);

        //     // response error validation
        //     if ($validator->fails()) {
        //         return Redirect::back()->withErrors($validator);
        //     }
        //     if ($request->hasFile('file')) {
        //         $name = $request->file('file')->getClientOriginalName();
        //         $filename = time() . '-' . $name;
        //         $file = $request->file('file');
        //         $file->move(public_path('Document'), $filename);

        //         DaftarSidangModel::create([
        //             'nama' => $request->nama,
        //             'npm' => $request->npm,
        //             'tanggal_sidang' => Carbon::parse($request->tanggal_sidang)->format('Y-m-d'),
        //             'jam' => $request->jam,
        //             'file' => $filename,
        //         ]);
        //         return redirect('/daftarsidang')->with('success', 'Berhasil tambah data');
        //     } else {
        //         DaftarSidangModel::create([
        //             'nama' => $request->nama,
        //             'npm' => $request->npm,
        //             'tanggal_sidang' => Carbon::parse($request->tanggal_sidang)->format('Y-m-d'),
        //             'jam' => $request->jam,
        //         ]);
        //         return redirect('/daftarsidang')->with('success', 'Berhasil tambah data');
        //     }
        // }

           $validator = Validator::make($request->all(), [
                'mahasiswa' => 'required',
               'npm' => 'required',
               'tanggal_sidang' => 'required',
               'jam' =>'required',
               'file' =>'required',
               'doc' =>'required',

           ]);

           // response error validation
           if ($validator->fails()) {
               return Redirect::back()->withErrors($validator);
           }

           DaftarWisudaModel::create([
                'mahasiswa_id' => $request->mahasiswa,
               'npm' => $request->npm,
               'tanggal_sidang' => Carbon::parse($request->tanggal_sidang)->format('Y-m-d'),
               'jam' => $request->jam,
               'file' => $request->file,
               'doc' => $request->doc,
           ]);

           return redirect('/daftarwisuda')->with('success', 'Berhasil tambah data');
        // $directory = public_path('excel');
        // if (!is_dir($directory)) {
        //     mkdir($directory, 0755, true);
        // }

        // if ($request->hasFile('file')) {
        //     $name = $request->file('file')->getClientOriginalName();
        //     $filename = time() . '-' . $name;
        //     $file = $request->file('file');

        //     $file->move($directory, $filename);

        //     DaftarSidangModel::create([
        //         'nama' => $request->nama,
        //         'npm' => $request->npm,
        //         'tanggal_sidang' => Carbon::parse($request->tanggal_sidang)->format('Y-m-d'),
        //         'jam' => $request->jam,
        //         'file' => $filename,
        //     ]);
        // } else {
        //     $validator = Validator::make($request->all(), [
        //         'npm' => 'required',
        //         'nama' => 'required',
        //         'tanggal_sidang' => 'required',
        //         'jam' => 'required',
        //     ]);

        //     if ($validator->fails()) {
        //         return Redirect::back()->withErrors($validator);
        //     }

        //     DaftarSidangModel::create([
        //         'nama' => $request->nama,
        //         'npm' => $request->npm,
        //         'tanggal_sidang' => Carbon::parse($request->tanggal_sidang)->format('Y-m-d'),
        //         'jam' => $request->jam,
        //     ]);
        // }

        // return redirect('/daftarsidang')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['mahasiswa'] = MahasiswaModel::where('user_id', Auth::user()->id)->get();
        $data['daftarwisuda'] = DaftarWisudaModel::where('id', $id)->first();
        return view('pages.daftarwisuda.editdaftarwisuda', $data);
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
            'mahasiswa' => 'required',
            'npm' => 'required',
            'tanggal_sidang' => 'required',
            'jam' => 'required',
            'file' => 'required',
            'doc' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        DaftarWisudaModel::where('id', $id)->update([
            'mahasiswa_id' => $request->mahasiswa,
            'npm' => $request->npm,
            'tanggal_sidang' => $request->tanggal_sidang,
            'jam' => $request->jam,
            'file' => $request->file,
            'doc' => $request->doc,
        ]);

        return redirect('/daftarwisuda')->with('success', 'Berhasil update data');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DaftarWisudaModel::where('id', $id)->delete();
        return redirect('/daftarwisuda');
    }
}