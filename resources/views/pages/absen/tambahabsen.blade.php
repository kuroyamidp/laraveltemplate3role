@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content">
                    <a href="{{route('absensi.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">

                    <form action="{{route('absensi.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-3">
                                <label for="form-control">Kode Absen</label>
                                <input type="text" class="form-control" name="kode_absen">
                                @if($errors->has('kode_absen'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kode_absen') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Jurusan</label>
                                <select class="form-control" data-live-search="true" name="progdi">
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
                            <div class="col-lg-3">
                                <label for="form-control">Siswa</label>
                                <select class="form-control" data-live-search="true" name="mahasiswa">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($mahasiswa as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('mahasiswa'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mahasiswa') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">kelas</label>
                                <select class="form-control" data-live-search="true" name="kelas">
                                    <option value="">Pilih salah satu</option>
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
                        <div class="col-lg-4">
                                <label for="form-control">Absen</label>
                                <select name="status" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    <option value="0">Tidak Masuk</option>
                                    <option value="1">Masuk</option>
                                    <option value="2">Ijin</option>
                                    <option value="3">Sakit</option>
                                </select>
                                @error('status')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
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