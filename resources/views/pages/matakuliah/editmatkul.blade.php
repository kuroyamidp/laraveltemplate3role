@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('matakuliah.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('matakuliah.update', $matakuliah['uid'])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">Kode mata kuliah</label>
                                <input type="text" class="form-control" name="kode" value="{{$matakuliah['kode_mk']}}">
                                @if($errors->has('kode'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kode') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="form-control">Nama mata kuliah</label>
                                <input type="text" class="form-control" name="mata_kuliah" value="{{$matakuliah['nama']}}">
                                @if($errors->has('mata_kuliah'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mata_kuliah') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">SKS</label>
                                <input type="number" min="0" max="100" id="skstambah" class="form-control" name="sks" value="{{$matakuliah['sks']}}">
                                @if($errors->has('sks'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('sks') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Bobot</label>
                                <input type="number" min="0" max="100" id="bobottambah" class="form-control" name="bobot" onchange="calculatemutu()" value="{{$matakuliah['bobot']}}">
                                @if($errors->has('bobot'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('bobot') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Mutu</label>
                                <input type="number" readonly min="0" max="100" id="mututambah" class="form-control" name="mutu" value="{{$matakuliah['mutu']}}">
                                @if($errors->has('mutu'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mutu') }}
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