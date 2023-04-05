<?php

namespace App\Http\Controllers;

use App\Models\Master\KrsModel;
use App\Models\Master\DosenModel;
use App\Models\Master\JadwalkelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AccKrsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

        if (Auth::user()->role_id == 0) {
            // $data['krs'] = KrsModel::with('mahasiswa')->get();
            $krs = KrsModel::select("*", "mahasiswa.nim", "mahasiswa.nama")->leftJoin("mahasiswa", "mahasiswa.id", "=", "krs.mahasiswa_id")->get();

            $data = [];
            foreach ($krs as $item) {
                // $coba=explode(",", $item->jadwal_id);
                $coba = json_decode($item->jadwal_id);



                $item->daftar_jadwal = JadwalkelasModel::whereIn("id", $coba)->get();
                // $data[] = [
                //     'mahasiswa_id' => $item->mahasiswa_id,
                //     'nama' => $item->matkul ? $item->matkul->nama : '',
                //     'sks' => $item->matkul ? $item->matkul->sks : '',
                //     'semester' => $item->semester,
                // ];
            }
            $data = [
                "krs" => $krs
            ];
            return view('pages.acckrs.acckrs', $data);
        } elseif (Auth::user()->role_id == 1) {
            return view('pages.acckrs.acckrs');
        } else {
            //  return Auth::user()->mahasiswa['semester_berjalan'];
            return view('pages.dashboard.dashboardmahasiswa');
        }
    }
    public function status(Request $request)
    {
        $krs_id = $request->input('id');

        // Update kolom status menjadi 1 pada KrsModel dengan ID yang sesuai
        $krs = KrsModel::find($krs_id);
        if ($krs !== null) {
            $krs->status = 0;
            $krs->save();

        }
        return redirect('/acckrs');
    }
    public function create()
    {
        $data['krs'] = KrsModel::get();
        return view('pages.acckrs.tambahstatuskrs', $data);
    
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required',

        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        KrsModel::create([
            'id' => $request->id,
            'status' => $request->status,
        ]);

        return redirect('/acckrs')->with('success', 'Berhasil tambah data');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|numeric',


        ]);

        // response error validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        KrsModel::where('id', $id)->update([
            'status' => $request->status,

        ]);

        return redirect('/matakuliah')->with('success', 'Berhasil update data');
    }
    public function show($id)
    {
        $krs = KrsModel::select("*", "mahasiswa.nim", "mahasiswa.nama")->leftJoin("mahasiswa", "mahasiswa.id", "=", "krs.mahasiswa_id")->get();

            $data = [];
            foreach ($krs as $item) {
                // $coba=explode(",", $item->jadwal_id);
                $coba = json_decode($item->jadwal_id);



                $item->daftar_jadwal = JadwalkelasModel::whereIn("id", $coba)->get();
                // $data[] = [
                //     'mahasiswa_id' => $item->mahasiswa_id,
                //     'nama' => $item->matkul ? $item->matkul->nama : '',
                //     'sks' => $item->matkul ? $item->matkul->sks : '',
                //     'semester' => $item->semester,
                // ];
            }
            $data = [
                "krs" => $krs
            ];
        return view('pages.acckrs.acckrs', $data);
    }


    public function updateHome(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'jadwal_id' => 'required',
            'kode_mk' => 'required',
        ]);

        // Ambil data KRS yang ingin diubah
        $krs = KrsModel::find($id);

        // Update data KRS
        $krs->mata_kuliah = $request->input('jadwal_id');
        $krs->save();

        // Redirect ke halaman KRS
        return redirect('/krs');    
    }
    public function destroy($id)
    {

        KrsModel::where('uid', $id)->delete();

        return redirect('/acckrs');

    }
}