@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Master Data</a></li>
            <li class="breadcrumb-item">Mahasiswa</li>
            <li class="breadcrumb-item active">Tambah Mahasiswa</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control rounded-pill" id="nis" name="nis" placeholder="Masukkan NIS">
                                @error('nis')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control rounded-pill" id="nim" name="nim" placeholder="Masukkan NIM">
                                @error('nim')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control rounded-pill" id="nama" name="nama" placeholder="Masukkan Nama">
                                @error('nama')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control rounded-pill">
                                    <option value="">Pilih Kelas</option>
                                    @foreach($kelas as $value)
                                    <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="progdi" class="form-label">Jurusan</label>
                                <select name="progdi" id="progdi" class="form-control rounded-pill">
                                    <option value="">Pilih Jurusan</option>
                                    @foreach($progdi as $value)
                                    <option value="{{ $value->id }}">{{ $value->nama_studi }} [ {{ $value->singkatan_studi }} ]</option>
                                    @endforeach
                                </select>
                                @error('progdi')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control rounded-pill">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="foto" class="form-label">Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                                    <label class="custom-file-label rounded-pill" for="foto">Pilih file</label>
                                </div>
                                @error('foto')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm rounded-pill px-4" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .form-control {
        font-size: 14px;
        padding: 10px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .custom-file-label::after {
        content: "Browse";
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .card {
        border-radius: 10px;
    }

    .rounded-pill {
        border-radius: 50px;
    }
</style>
@endsection
