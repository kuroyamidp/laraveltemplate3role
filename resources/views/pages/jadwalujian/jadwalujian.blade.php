@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('jadwalujian.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Mata kuliah</th>
                                        <th>Ruang</th>
                                        <th>Dosen</th>
                                        <th>Jam</th>
                                        <th>Tanggal Ujian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1
                                    @endphp
                                    @foreach ($jadwalujians as $v)
                                    <tr style="text-align: center;">
                                        <td width="1%">{{$no++}}</td>
                                        <td>{{$v->matkul}}</td>
                                        <td>{{$v->ruang}}</td>
                                        <td>{{$v->dosen}}</td>
                                        <td>{{$v->jam}}</td>
                                        <td>{{$v->tanggal}}</td>
                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('jadwalujian.show', $v->id) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit"></i></a>
                                                <form action="{{ route('jadwalujian.destroy', $v->id) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm"><i class="bx bx-trash"></i></button>
                                                        
                                                    </form>
                                                   
                                                
                                                    
                                                <!-- <button type="button" class="btn btn-danger"><i class="bx bx-trash"></i></button> -->
                                        
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