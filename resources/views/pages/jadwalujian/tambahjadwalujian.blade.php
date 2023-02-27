@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="/jadwalujian" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">

                    <form action="{{route('jadwalujian.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Mata kuliah</label>
                                <select class="selectpicker" data-live-search="true" name=" mata_kuliah">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($matkul as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('mata_kuliah'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mata_kuliah') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Ruang</label>
                                <select class="selectpicker" data-live-search="true" name="ruang_kelas">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($ruang as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('ruang_kelas'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('ruang_kelas') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Dosen</label>
                                <select class="selectpicker" data-live-search="true" name="dosen">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($dosen as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('dosen'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('dosen') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" placeholder="dd-mm-yyyy" >
                                @if($errors->has('tanggal'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('tanggal') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Jam</label>
                                <input type="time" name="jam" class="form-control">
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