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

                    <form action="{{ route('absensi.update', $absen['uid']) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-3">
                                <label for="form-control">Kode Absen</label>
                                <input type="text" class="form-control" name="kode_absen" value="{{ $absen['kode_absen'] }}">
                                @if($errors->has('kode_absen'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kode_absen') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="form-control">Jurusan</label>
                                <select class="form-control" data-live-search="true" name="progdi">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($progdi as $key => $value)
                                    @if($absen['progdi_id'] == $value->id)
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
                            <div class="col-lg-6">
                                <label for="form-control">Mahasiswa</label>
                                <select class="form-control" data-live-search="true" name="mahasiswa">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($mahasiswa as $key => $value)
                                    @if($absen['mahasiswa_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('mahasiswa'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mahasiswa') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Kelas</label>
                                <input type="hidden" name="uid" value="{{$absen['uid']}}">
                                <select name="kelas" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($kelas as $key => $value)
                                    @if($absen['kelas_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}} </b></option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama}}</b></option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('kelas'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kelas') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    <option value="0" {{ $absen['status'] == '0' ? 'selected' : '' }}>Tidak Masuk</option>
                                    <option value="1" {{ $absen['status'] == '1' ? 'selected' : '' }}>Masuk</option>
                                    <option value="2" {{ $absen['status'] == '2' ? 'selected' : '' }}>Ijin</option>
                                    <option value="3" {{ $absen['status'] == '3' ? 'selected' : '' }}>Sakit</option>
                                </select>
                                @if($errors->has('status'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('status') }}
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