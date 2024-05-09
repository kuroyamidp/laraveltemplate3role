@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row">
        <div class="col-lg-12">
            <form id="configform" action="{{ route('absensi.index') }}" method="get">
                @csrf
                <div class="row mb-1 mt-1">
                    <div class="col-lg-3">
                        <label for="kode_kelas">Kode Jadwal</label> <!-- Ubah label -->
                        <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" placeholder="Cari berdasarkan Kode Kelas"> <!-- Ubah tipe input dan nama -->
                        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                        <button type="reset" onclick="reset()" class="btn btn-warning btn-sm">Reset</button>
                    </div>

                    <div class="col-lg-3">

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('absensi.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="kelas-table">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode absensi</th>
                                        <th>Jurusan</th>
                                        <th>Kelas</th>
                                        <th>Siswa</th>
                                        <th>hari</th>
                                        <th>Status</th>
                                        <!-- Pindahkan pengecekan ke sini -->
                                        @if(Auth::user()->role_id != 2)
                                        <th>aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="text-center" id="data-table-body">
                                    @foreach($absen as $key => $value)
                                    <tr>
                                        <td width="1%">{{ $key + 1 }}</td>
                                        <td>{{ $value->kode_absen }}</td>
                                        <td>{{ $value->progdi}}</td>
                                        <td><b>KELAS </b>{{ $value->kelas }}</td>
                                        <td>{{ $value->mahasiswa_id }}</td>
                                        <td>{{ $value->hari }}</td>
                                        <td>
                                            @if($value->status_absensi == 0)
                                            <span class="badge badge-danger">Alpha</span>
                                            @elseif($value->status_absensi == 1)
                                            <span class="badge badge-primary">Masuk</span>
                                            @elseif($value->status_absensi == 2)
                                            <span class="badge badge-primary">Ijin</span>
                                            @else
                                            <span class="badge badge-success">Sakit</span>
                                            @endif
                                        </td>
                                        <!-- Pindahkan pengecekan ke sini -->
                                        @if(Auth::user()->role_id != 2)
                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('absensi.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>
                                            <form action="{{ route('absensi.destroy', $value->uid) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title="Delete" type="submit"><i class="bx bx-trash bx-sm"></i></button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>



                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div>

    @endsection