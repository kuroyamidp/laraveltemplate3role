@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('mahasiswa.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('mahasiswa.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-3">
                                <label for="form-control">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{$mahasiswa['nim']}}">
                                <input type="hidden" class="form-control" name="uid" value="{{$mahasiswa['uid']}}">
                                @if($errors->has('nim'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('nim') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$mahasiswa['nama']}}">
                                @if($errors->has('nama'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('nama') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Progdi</label>
                                <select name="progdi" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($progdi as $key => $value)
                                    @if($mahasiswa['progdi_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama_studi}} [ {{$value->jenjang_studi}} ] </option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama_studi}} [ {{$value->jenjang_studi}} ] </option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('progdi'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('progdi') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Perguruan tinggi</label>
                                <input type="text" class="form-control" name="perguruan_tinggi" value="{{$mahasiswa['perguruan_tinggi']}}">
                                @if($errors->has('perguruan_tinggi'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('perguruan_tinggi') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-2">
                                <label for="form-control">Jenis kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    @if($mahasiswa['jenis_kelamin'] == 1)
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

                            <div class="col-lg-2">
                                <label for="form-control">Semester awal</label>
                                <input type="text" class="form-control" name="semester_awal" value="{{$mahasiswa['semester_awal']}}">
                                @if($errors->has('semester_awal'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('semester_awal') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-2">
                                <label for="form-control">Semester saat ini</label>
                                <input type="number" min="0" max="20" class="form-control" name="semester_berjalan" value="{{$mahasiswa['semester_berjalan']}}">
                                @if($errors->has('semester_berjalan'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('semester_berjalan') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Status Awal Mahasiswa</label>
                                <input type="text" class="form-control" name="status_awal" value="{{$mahasiswa['status_mahasiswa']}}">
                                @if($errors->has('status_awal'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('status_awal') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Status mahasiswa saat ini</label>
                                <select name="status" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    @if($mahasiswa['status'] == 0)
                                    <option value="0" selected>Tidak aktif</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Lulus</option>
                                    @elseif($mahasiswa['status'] == 1)
                                    <option value="0">Tidak aktif</option>
                                    <option value="1" selected>Aktif</option>
                                    <option value="2">Lulus</option>
                                    @else
                                    <option value="0">Tidak aktif</option>
                                    <option value="1">Aktif</option>
                                    <option value="2" selected>Lulus</option>
                                    @endif
                                </select>
                                @if($errors->has('status'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('status') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Foto <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="foto" accept="image/*">
                                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> -->
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                                @if($errors->has('foto'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('foto') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <img src="/Image/{{$mahasiswa['image']}}" style="width: 300px; height: 300px !important" class="img-thumbnail" alt="Image-{{$mahasiswa['nama']}}">
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