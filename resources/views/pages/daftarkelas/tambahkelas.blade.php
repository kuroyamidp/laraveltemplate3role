@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content">
                    <a href="{{route('daftar-kelas.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">

                    <form action="{{route('daftar-kelas.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">Kode kelas</label>
                                <input type="text" class="form-control" name="kode_kelas">
                                @if($errors->has('kode_kelas'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kode_kelas') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="hari">Hari</label>
                                <select name="hari" class="form-control">
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                                @if($errors->has('hari'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('hari') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">Jurusan</label>
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
                                <label for="form-control">Guru</label>
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
                            <div class="col-lg-2">
                                <label for="form-control">kelas</label>
                                <select class="selectpicker" data-live-search="true" name="kelas">
                                    <option value="">Pilih</option>
                                    @foreach($kelas as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-1">
                        <div class="col-lg-8">
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
                            <div class="col-lg-2">
                                <label for="form-control">Ruang kelas</label>
                                <select class="selectpicker" data-live-search="true" name="ruang_kelas">
                                    <option value="">Pilih</option>
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
                            <div class="col-lg-2">
                                <label for="form-control">Jam</label>
                                <select class="selectpicker" data-live-search="true" name="waktu">
                                    <option value="">Pilih</option>
                                    @foreach($waktu as $key => $value)
                                    <option value="{{$value->jam}}">{{$value->jam}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('waktu'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('waktu') }}
                                </div>
                                @endif
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            </div>
                        </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection