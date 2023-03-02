@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('nilaiujian.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                    {{-- <a href="/cetakdaftarsidang" class="btn btn-success btn-sm">Print</a> --}}

                </div>
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Mahasiswa ID</th>
                                        <th>Mata Kuliah ID</th>
                                        <th>Nilai Ujian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no=1
                                @endphp
                                @foreach ($nilaiujian as $v)
                                <tr style="text-align: center;">
                                    <td width="1%">{{$no++}}</td>
                                    <td>{{$v->mahasiswa}}</td>
                                    <td>{{$v->matkul}}</td>
                                    <td>{{$v->nilai}}</td>
                                        <td class="text-center" style="display: flex; justify-content: center;">

                                            <a href="{{route('nilaiujian.show',$v->id)}}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>

                                            <form action="{{route('nilaiujian.destroy',$v->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title='Delete' type="submit"><i class="bx bx-trash bx-sm"></i></button>
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