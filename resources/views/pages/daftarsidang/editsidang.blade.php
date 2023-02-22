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
                    <form action="{{route('daftarsidang.update', $daftarsidangs['id'])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">NPM</label>
                                <input type="text" class="form-control" name="kode" value="{{$daftarsidangs['npm']}}">
                                @if($errors->has('kode'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kode') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="form-control">Nama</label>
                                <input type="text" class="form-control" name="mata_kuliah" value="{{$daftarsidangs['nama']}}">
                                @if($errors->has('mata_kuliah'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mata_kuliah') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Jam</label>
                                <input type="number" min="0" max="100" id="skstambah" class="form-control" name="sks" value="{{$daftarsidangs['jam']}}">
                                @if($errors->has('sks'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('sks') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Bobot</label>
                                <input type="number" min="0" max="100" id="bobottambah" class="form-control" name="bobot" value="{{$daftarsidangs['tanggal_sidang']}}">
                                @if($errors->has('bobot'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('bobot') }}
                                </div>
                                @endif
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