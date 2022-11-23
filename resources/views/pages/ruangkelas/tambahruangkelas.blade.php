@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('ruangkelas.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('ruangkelas.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">Kode ruang kelas</label>
                                <input type="text" class="form-control" name="kode_ruang">
                                @if($errors->has('kode_ruang'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kode_ruang') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="form-control">Nama ruang kelas</label>
                                <input type="text" class="form-control" name="nama_ruang">
                                @if($errors->has('nama_ruang'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('nama_ruang') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection