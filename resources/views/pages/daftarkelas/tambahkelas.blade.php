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

                    <form action="{{route('daftar-kelas.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Kode kelas</label>
                                <input type="text" class="form-control" name="kode_kelas">
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
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
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
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
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
                                    <option value="{{$value->id}}">{{$value->nama_studi}}</option>
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
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
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
                                <select class="selectpicker" data-live-search="true" name="semester">
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
                                <input type="time" name="mulai" class="form-control">
                                @if($errors->has('mulai'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mulai') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Jam selesai kelas</label>
                                <input type="time" name="selesai" class="form-control">
                                @if($errors->has('selesai'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('selesai') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Limit mahasiswa</label>
                                <input type="number" min="0" max="100" class="form-control" name="limit_mahasiswa">
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