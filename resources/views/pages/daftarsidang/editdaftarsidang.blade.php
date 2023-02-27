@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('daftarsidang.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('daftarsidang.update', $daftarsidangs['nama'])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">NPM</label>
                                <input type="text" class="form-control" name="npm" value="{{$daftarsidangs['npm']}}">
                                @if($errors->has('npm'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('npm') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="form-control">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$daftarsidangs['nama']}}">
                                @if($errors->has('nama'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('nama') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Jam</label>
                                <input type="time" min="0" max="100" id="skstambah" class="form-control" name="jam" value="{{$daftarsidangs['jam']}}">
                                @if($errors->has('jam'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('jam') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Tanggal</label>
                                <input type="date" min="0" max="100" id="bobottambah" class="form-control" name="tanggal_sidang" value="{{$daftarsidangs['tanggal_sidang']}}">
                                @if($errors->has('tanggal_sidang'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('tanggal_sidang') }}
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