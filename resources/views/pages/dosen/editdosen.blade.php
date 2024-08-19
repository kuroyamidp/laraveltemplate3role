@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('dosen.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('dosen.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Jurusan</label>
                                <input type="hidden" name="uid" value="{{$dosen['uid']}}">
                                <select name="progdi" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($progdi as $key => $value)
                                    @if($dosen['progdi_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama_studi}} [ {{$value->jenjang_studi}} ] <b>{{$value->singkatan_studi}}</b></option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama_studi}} [ {{$value->jenjang_studi}} ] <b>{{$value->singkatan_studi}}</b></option>
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
                                <label for="form-control">kelas</label>
                                <input type="hidden" name="uid" value="{{$dosen['uid']}}">
                                <select name="kelas" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($kelas as $key => $value)
                                    @if($dosen['kelas_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}}</b></option>
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
                            <div class="col-lg-4">
                                <label for="form-control">NUPTK</label>
                                <input type="text" class="form-control" name="nidn" value="{{$dosen['nidn']}}">
                                @if($errors->has('nidn'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('nidn') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Nama Guru</label>
                                <input type="text" class="form-control" name="dosen" value="{{$dosen['nama']}}">
                                @if($errors->has('dosen'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('dosen') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Jenis kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    @if($dosen['jenis_kelamin'] == 1)
                                    <option value="1" selected>Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                    @else
                                    <option value="1">Laki-laki</option>
                                    <option value="2" selected>Perempuan</option>
                                    @endif
                                </select>
                                @if($errors->has('jenis_kelamin'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('jenis_kelamin') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="jabatan_fungsional">Jabatan Fungsional</label>
                                <select class="form-control" name="jabatan_fungsional">
                                    <option value="Guru" {{ $dosen['jabatan_fungsional'] == 'Guru' ? 'selected' : '' }}>Guru</option>
                                    <option value="Kepala Sekolah" {{ $dosen['jabatan_fungsional'] == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Foto <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="foto" accept="image/*">
                                        <span class="custom-file-container__custom-file__custom-file-control custom-file-container__custom-file__custom-file-control--browse">Browse</span>
                                    </label>
                                    <p>Nama File : {{$dosen['image']}}</p>
                                </div>
                                @if($errors->has('foto'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('foto') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-center">
                            <img src="/Image/{{$dosen['image']}}" style="width: 300px; height: 300px !important" class="img-thumbnail" alt="Image-{{$dosen['nama']}}">
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