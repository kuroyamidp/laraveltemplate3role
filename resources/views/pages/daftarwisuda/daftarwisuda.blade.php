@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{Route('daftarwisuda.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                    <a href="/cetakdaftarwisuda" class="btn btn-success btn-sm">Print</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Tanggal Ajukan Wisuda</th>
                                        <th>Jam</th>
                                        <th>Document-1</th>
                                        <th>Document-2</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($daftarwisuda as $key => $value)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td class="text-center">{{$value->mahasiswa}}</td>

                                        <td class="text-center">{{$value->npm}}</td>
                                        <td class="text-center">{{$value->tanggal_sidang}}</td>
                                        <td class="text-center">{{$value->jam}}</td>
                                        <td class="text-center">{{$value->file}}</td>
                                        <td class="text-center">{{$value->doc}}</td>
                                        <td class="text-center" style="display: flex; justify-content: center;">

                                            <a href=" {{ route('daftarwisuda.show', $value->id) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>

                                            <form action="{{ route('daftarwisuda.destroy', $value->id) }}" method="post">
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