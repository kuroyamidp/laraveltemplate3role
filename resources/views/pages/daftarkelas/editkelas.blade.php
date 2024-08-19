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

                    <form action="{{route('daftar-kelas.update', $kelas['uid'])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">Kode kelas</label>
                                <input type="text" class="form-control" name="kode_kelas" value="{{$kelas['kode_kelas']}}">
                                @if($errors->has('kode_kelas'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kode_kelas') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="hari">Hari</label>
                                <select name="hari" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    <option value="Senin" {{$kelas['hari'] == 'Senin' ? 'selected' : ''}}>Senin</option>
                                    <option value="Selasa" {{$kelas['hari'] == 'Selasa' ? 'selected' : ''}}>Selasa</option>
                                    <option value="Rabu" {{$kelas['hari'] == 'Rabu' ? 'selected' : ''}}>Rabu</option>
                                    <option value="Kamis" {{$kelas['hari'] == 'Kamis' ? 'selected' : ''}}>Kamis</option>
                                    <option value="Jumat" {{$kelas['hari'] == 'Jumat' ? 'selected' : ''}}>Jumat</option>
                                    <option value="Sabtu" {{$kelas['hari'] == 'Sabtu' ? 'selected' : ''}}>Sabtu</option>
                                    <option value="Minggu" {{$kelas['hari'] == 'Minggu' ? 'selected' : ''}}>Minggu</option>
                                </select>
                                @if($errors->has('hari'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('hari') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Jurusan</label>
                                <select class="selectpicker" data-live-search="true" name="progdi">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($progdi as $key => $value)
                                    @if($kelas['progdi_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->singkatan_studi}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->singkatan_studi}}</option>
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
                                <label for="form-control">Guru</label>
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
                                <label for="form-control">Waktu Sebelumnya adalah : {{$kelas['start']}}</label>
                                <select class="selectpicker" data-live-search="true" name="waktu" >
                                    <option value="">Pilih salah satu</option>
                                    @foreach($waktu as $key => $value)
                                    @if($kelas['start'] == $value->id)
                                    <option  value="{{$value->jam}}" selected>{{$value->jam}}</option>
                                    @else
                                    <option  value="{{$value->jam}}">{{$value->jam}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('waktu'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('waktu') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-8">
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
                            <div class="col-lg-2">
                                <label for="form-control">Kelas</label>
                                <select class="selectpicker" data-live-search="true" name="kelas">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($kls as $key => $value)
                                    @if($kelas['semester'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('kelas'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kelas') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-2">
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