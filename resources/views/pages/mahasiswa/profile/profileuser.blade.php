@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Mahasiswa</th>
                                        <th>Progdi</th>
                                        <th>Semester awal</th>
                                        <th>Status awal mahasiswa</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mahasiswa as $key => $value)
                                    <tr style="text-align: center;">
                                        <td width="1%">{{$key + 1}}</td>
                                        <td>{{$value->nim}}</td>
                                        <td>{{$value->nama}}</td>
                                        <td>
                                            @if($value->progdi == null)
                                            <span class="badge badge-warning">Progdi belum ditentukan</span>
                                            @else
                                            <span class="badge badge-success">{{$value->progdi}}</span>
                                            @endif
                                        </td>
                                        <td>{{$value->semester_awal}}</td>
                                        <td>{{$value->status_mahasiswa}}</td>
                                        <td>
                                            @if($value->status == 0)
                                            <span class="badge badge-danger">Non aktif</span>
                                            @elseif($value->status == 1)
                                            <span class="badge badge-primary">Aktif</span>
                                            @else
                                            <span class="badge badge-success">Lulus</span>

                                            @endif
                                        </td>
                                        <td class="text-center" style="display: flex; justify-content: center;">

                                            <a href="" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>




                                        </td>
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