@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>NISN Mahasiswa</th>
                                        <th>Tanggal Ajukan Sidang</th>
                                        <th>Jam</th>
                                        <th>Document-1</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($daftarsidangs as $key => $value)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td class="text-center">{{$value->nama}}</td>
                                        <td class="text-center">{{$value->npm}}</td>
                                        <td class="text-center">{{$value->tanggal_sidang}}</td>
                                        <td class="text-center">{{$value->jam}}</td>
                                        <td class="text-center">{{$value->file}}</td>
                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <form style="text-align: center;">
                                            <a href="" class="btn btn-primary" data-toggle="tooltip" title='Update'><i class="bx bx-envelope"></i></a>
                                            </form>
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
@endsection 