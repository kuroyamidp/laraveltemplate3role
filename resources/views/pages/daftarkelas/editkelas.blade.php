@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('daftar-kelas.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">

                    <form action="{{route('daftar-kelas.update', $kelas['uid'])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Kode kelas</label>
                                <input type="text" class="form-control" name="kode_kelas" value="{{$kelas['kode_kelas']}}">
                                @if($errors->has('kode_kelas'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kode_kelas') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Mata kuliah</label>
                                <select class="selectpicker" data-live-search="true" name=" mata_kuliah">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($matkul as $key => $value)
                                    @if($kelas['makul_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('mata_kuliah'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mata_kuliah') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Ruang kelas</label>
                                <select class="selectpicker" data-live-search="true" name="ruang_kelas">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($ruang as $key => $value)
                                    @if($kelas['ruang_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('ruang_kelas'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('ruang_kelas') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Progdi</label>
                                <select class="selectpicker" data-live-search="true" name="progdi">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($progdi as $key => $value)
                                    @if($kelas['progdi_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama_studi}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama_studi}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('progdi'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('progdi') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Dosen</label>
                                <select class="selectpicker" data-live-search="true" name="dosen">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($dosen as $key => $value)
                                    @if($kelas['dosen_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama}}</option>

                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('dosen'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('dosen') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Semester</label>
                                <select class="selectpicker" data-live-search="true" id="smt" name="semester">
                                    <option value="">Pilih salah satu</option>
                                    @if($kelas['semester'] == 1)
                                    <option value="1" selected>Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                    @elseif($kelas['semester'] == 2)
                                    <option value="1">Semester 1</option>
                                    <option value="2" selected>Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                    @elseif($kelas['semester'] == 3)
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3" selected>Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                    @elseif($kelas['semester'] == 4)
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4" selected>Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                    @elseif($kelas['semester'] == 5)
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5" selected>Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                    @elseif($kelas['semester'] == 6)
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6" selected>Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                    @elseif($kelas['semester'] == 7)
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7" selected>Semester 7</option>
                                    <option value="8">Semester 8</option>
                                    @elseif($kelas['semester'] == 8)
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8" selected>Semester 8</option>
                                    @else
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                    @endif
                                </select>
                                @if($errors->has('semester'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('semester') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Jam mulai kelas</label>
                                <input type="time" name="mulai" class="form-control" value="{{$kelas['start']}}">
                                @if($errors->has('mulai'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mulai') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Jam selesai kelas</label>
                                <input type="time" name="selesai" class="form-control" value="{{$kelas['end']}}">
                                @if($errors->has('selesai'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('selesai') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Limit mahasiswa</label>
                                <input type="number" min="0" max="100" class="form-control" name="limit_mahasiswa" value="{{$kelas['limit_mahasiswa']}}">
                                @if($errors->has('limit_mahasiswa'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('limit_mahasiswa') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection