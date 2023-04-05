<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Master\DaftarkelasModel;
use App\Models\Master\DosenModel;
use App\Models\Master\JadwalkelasModel;
use App\Models\Master\KrsModel;
use App\Models\Master\MatakuliahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PDF;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // return $data;
        $data['krs'] = KrsModel::where('mahasiswa_id', Auth::user()->mahasiswa->id)->orderBy('semester', 'desc')->get();
        foreach ($data['krs'] as $k => $v) {
            $jid = json_decode($v->jadwal_id);
            $v->jadwal = JadwalkelasModel::whereIn('id', $jid)->get();
        }
        return view('pages.krs.krs', $data);
    }

    public function cetakkrs(Request $request)
    {
        // $coba
        // $krs = KrsModel::select("krs.*", "mahasiswa.nim", "mahasiswa.nama", "mata_kuliah.nama AS nama_matkul", "mata_kuliah.sks")
        //     ->leftJoin("mahasiswa", "mahasiswa.id", "=", "krs.mahasiswa_id")
        //     ->leftJoin("jadwal_kelas", "jadwal_kelas.id", "=", "krs.jadwal_id")
        //     ->leftJoin("mata_kuliah", "mata_kuliah.id", "=", "jadwal_kelas.id")
        //     ->get();

        // $data = [];

        // foreach ($krs as $item) {
        //     $item->daftar_jadwal = JadwalkelasModel::whereIn("id", json_decode($item->jadwal_id))->get();

        //     $data[] = [
        //         'mahasiswa_id' => $item->mahasiswa_id,
        //                 'nama' => $item->matkul ? $item->matkul->nama : '',
        //                 'sks' => $item->matkul ? $item->matkul->sks : '',
        //                 'semester' => $item->semester,
        //     ];
        // }

        // $data = [
        //     "krs" => $data
        // ];

        // return $data;
        // // $coba
        $krs = KrsModel::select("*", "mahasiswa.nim", "mahasiswa.nama")->leftJoin("mahasiswa", "mahasiswa.id", "=", "krs.mahasiswa_id")->get();
           
        $data = [];

        foreach ($krs as $item) {
            // $coba=explode(",", $item->jadwal_id);
            $coba = json_decode($item->jadwal_id);



            $item->daftar_jadwal = JadwalkelasModel::whereIn("id", $coba)->get();
        }
        $data = [
            "krs" => $krs
        ];
        // view()->share('data', $data);
        $pdf = PDF::loadview('pages.krs.cetakkrs-pdf', $data);
        return $pdf->download('krs.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = Auth::user()->mahasiswa;
        $smt_gangen = $mhs->semester_berjalan % 2;
        $krs = KrsModel::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();
        $hstJdw = [];
        foreach ($krs as $k => $v) {
            $jdw = json_decode($v->jadwal_id);
            $hstJdw = array_merge($hstJdw, $jdw);
        }
        $jdw = JadwalkelasModel::whereRaw('semester%2<>' . $smt_gangen)->whereNotIn('id', $hstJdw)->get();
        $check = [];
        foreach ($jdw as $key => $value) {
            if ($value->matkul->progdi_id == Auth::user()->mahasiswa->progdi_id || !Auth::user()->mahasiswa->progdi_id) {
                $check[$value->hari][] = $value;
            }
        }
        $data['jdw'] = $check;
        return view('pages.krs.tambahkrs', $data);
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
            'jadwal_id' => 'required',
            'hdn_semester' => 'required',
        ]);

        KrsModel::UpdateOrCreate([
            'semester' => $request->hdn_semester,
            'mahasiswa_id' => Auth::user()->mahasiswa->id,
        ], [
            'uid' => Str::orderedUuid(),
            'semester' => $request->hdn_semester,
            'mahasiswa_id' => Auth::user()->mahasiswa->id,
            'jadwal_id' => json_encode($request->jadwal_id),
        ]);
        return redirect('/krs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $mhs = Auth::user()->mahasiswa;
        $smt_gangen = $mhs->semester_berjalan % 2;
        $krs = KrsModel::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();
        $hstJdw = [];
        foreach ($krs as $k => $v) {
            $jdw = json_decode($v->jadwal_id);
            $hstJdw = array_merge($hstJdw, $jdw);
        }
        $jdw = JadwalkelasModel::whereRaw('semester%2<>' . $smt_gangen)->get();
        $check = [];
        foreach ($jdw as $key => $value) {
            if ($value->matkul->progdi_id == Auth::user()->mahasiswa->progdi_id || !Auth::user()->mahasiswa->progdi_id) {
                $check[$value->hari][] = $value;
            }
        }

        $data['jdw'] = $check;
        return view('pages.krs.tambahkrs', $data);
        // $data['krs'] = KrsModel::where('uid', $id)->first();
        // $avlb = KrsModel::where('semester', $data['krs']['semester'])->get();
        // $jdw = [];
        // foreach ($avlb as $key => $value) {
        //     $jdw[] = $value->jadwal_id;
        // }
        // $data['jdw'] = JadwalKelasModel::where('semester', $data['krs']['semester'])->whereNotIn('id', $jdw)->get();
        // // $data['jdw'] = $jdw;
        // // return $data;
        // return view('pages.krs.editkrs', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Auth::user()->mahasiswa;
        $smt_gangen = $mhs->semester_berjalan % 2;
        $krs = KrsModel::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();
        $hstJdw = [];
        foreach ($krs as $k => $v) {
            $jdw = json_decode($v->jadwal_id);
            $hstJdw = array_merge($hstJdw, $jdw);
        }
        $jdw = JadwalkelasModel::whereRaw('semester%2<>' . $smt_gangen)->whereIn('id', $hstJdw)->get();
        $check = [];
        foreach ($jdw as $key => $value) {
            if ($value->matkul->progdi_id == Auth::user()->mahasiswa->progdi_id || !Auth::user()->mahasiswa->progdi_id) {
                $check[$value->hari][] = $value;
            }
        }

        $data['jdw'] = $check;
        return view('pages.krs.lihatkrs', $data);
    }

    /**
     * 
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateKrs(Request $request, $id)
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function destroy($id)
    {

        KrsModel::where('uid', $id)->delete();
        return redirect('/krs'); 
    }
}
