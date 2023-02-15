@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('jadwal-kelas.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('jadwal-kelas.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Periode</label>
                                <input type="month" name="periode" class="form-control" placeholder="dd-mm-yyyy" >
                                @if($errors->has('periode'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('periode') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Hari</label>
                                <select name="hari" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumaat">Jumaat</option>
                                    <option value="sabtu">Sabtu</option>
                                </select>
                                @if($errors->has('hari'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('hari') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Semester</label>
                                <select id="smt" class="selectpicker" data-live-search="true" name="semester" onchange="getkelas()">
                                    <option value="">Pilih salah satu</option>
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                </select>
                                @if($errors->has('semester'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('semester') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <label for="form-control">Pilih kelas</label>
                                <select class="placeholder js-states form-control" name="kelas[]" id="kls" multiple="multiple">

                                </select>
                                @if($errors->has('kelas'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kelas') }}
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