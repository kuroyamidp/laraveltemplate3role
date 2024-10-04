@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('waktu.index') }}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('waktu.store') }}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="kode">Kode Waktu</label>
                                <input type="text" class="form-control" name="kode">
                                @if($errors->has('kode'))
                                    <div class="error" style="color: red; display:block;">
                                        {{ $errors->first('kode') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="jam">Jam (Format: HH:MM-HH:MM)</label>
                                <input type="text" class="form-control" name="jam">
                                @if($errors->has('jam'))
                                    <div class="error" style="color: red; display:block;">
                                        {{ $errors->first('jam') }}
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
