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
                    <form action="{{route('daftarsidang.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">NPM</label>
                                <input type="numbert" class="form-control" name="npm">
                                @if($errors->has('npm'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('npm') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="form-control">Nama</label>
                                <input type="text" class="form-control" name="nama">
                                @if($errors->has('nama'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('nama') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-6">
                            <label for="form-control">Jam</label>
                                <input type="time" name="jam" class="form-control">
                                @if($errors->has('jam'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('jam') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                            <label for="form-control">Tanggal Sidang</label>
                                <input type="date" name="tanggal_sidang" class="form-control" placeholder="dd-mm-yyyy" >
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