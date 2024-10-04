@extends('layouts.main')

@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uid" value="{{ $mahasiswa['uid'] }}">
                        <div class="row mb-1">
                            <div class="col-lg-3">
                                <label for="form-control">NIS</label>
                                <input type="text" class="form-control rounded-pill" name="nis" value="{{ $mahasiswa['nis'] }}">
                                @error('nis')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">NIM</label>
                                <input type="text" class="form-control rounded-pill" name="nim" value="{{ $mahasiswa['nim'] }}">
                                @error('nim')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Nama</label>
                                <input type="text" class="form-control rounded-pill" name="nama" value="{{ $mahasiswa['nama'] }}">
                                @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Kelas</label>
                                <select name="kelas" class="form-control rounded-pill">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($kelas as $value)
                                    <option value="{{ $value->id }}" {{ $mahasiswa['semester_id'] == $value->id ? 'selected' : '' }}>{{ $value->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Jurusan</label>
                                <select name="progdi" class="form-control rounded-pill">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($progdi as $value)
                                    <option value="{{ $value->id }}" {{ $mahasiswa['progdi_id'] == $value->id ? 'selected' : '' }}>{{ $value->nama_studi }}</option>
                                    @endforeach
                                </select>
                                @error('progdi')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control rounded-pill">
                                    <option value="">Pilih salah satu</option>
                                    <option value="1" {{ $mahasiswa['jenis_kelamin'] == 1 ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="2" {{ $mahasiswa['jenis_kelamin'] == 2 ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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
                                    <p>Nama File: {{ $mahasiswa['image'] }}</p>
                                </div>
                                @error('foto')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 d-flex align-items-center justify-content-center">
                                <img src="/Image/{{ $mahasiswa['image'] }}" style="width: 300px; height: 300px !important" class="img-thumbnail" alt="Image-{{ $mahasiswa['nama'] }}">
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
