@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row">
        <div class="col-lg-12">
            <form id="configform" action="{{route('jadwal-kelas.index')}}" method="get">
                @csrf
                <div class="row mb-1 mt-1">
                    <div class="col-lg-3">
                        <label for="form-control">Periode</label>
                        <input type="month" class="form-control" name="bulan" required>

                    </div>
                    <div class="col-lg-3">
                        <label for="form-control">Semester</label>
                        <select class="form-control" name="tingkat" required>
                            <option value="">Pilih salah satu</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                            <option value="7">Semester 7</option>
                            <option value="8">Semester 8</option>
                        </select>

                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                        <button type="reset" onclick="rest()" class="btn btn-warning btn-sm">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('jadwal-kelas.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered" id="default-ordering">
                                @foreach($jdw as $key => $value)
                                <thead>
                                    <tr>
                                        <th colspan="4" class="text-center text-uppercase">{{$key}}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Mata kuliah</th>
                                        <th class="text-center">Jam</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($value as $ky => $val)
                                    <tr>
                                        <td class="text-center" width="1%">{{$ky + 1}}</td>
                                        <td>{{$val->matkul['matkul']}} - <b> SEMESTER {{$val->semester}}</b></td>
                                        <td class="text-center">{{$val->jam}}</td>
                                        <td style="display: flex; justify-content: center;">

                                            <a href="{{ route('jadwal-kelas.show', $val->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>

                                            <form action="{{ route('jadwal-kelas.destroy', $val->uid) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title='Delete' type="submit"><i class="bx bx-trash bx-sm"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection