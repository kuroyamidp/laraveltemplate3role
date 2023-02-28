@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('nilaiujian.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('nilaiujian.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Nama Mahasiswa</label>
                                <select class="selectpicker" data-live-search="true" name="mahasiswa_id">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($mhs as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('mahasiswa_id'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mahasiswa_id') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Nama Mata Kuliah</label>
                                <select class="selectpicker" data-live-search="true" name="matkul_id">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($matkul as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('matkul_id'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('matkul_id') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Nilai</label>
                                <input type="number" min="0" max="100" class="form-control" name="nilai_ujian">
                                @if($errors->has('nilai_ujian'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('nilai_ujian') }}
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