@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('nilaiujian.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">

                    <form action="{{route('nilaiujian.update', $nilaiujian['id'])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <label for="form-control">Nama Mahasiswa</label>
                                <select class="selectpicker" data-live-search="true" name="mahasiswa">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($mahasiswa as $key => $value)
                                    @if($nilaiujian['mahasiswa_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('mahasiswa'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mahasiswa') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Nama Mata Kuliah</label>
                                <select class="selectpicker" data-live-search="true" name="mata_kuliah">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($matkul as $key => $value)
                                    @if($nilaiujian['matkul_id'] == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('mata_kuliah'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mata_kuliah') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Nilai</label>
                                <input type="number" min="0" max="100" class="form-control" name="nilai" value="{{$nilaiujian['nilai']}}">
                                @if($errors->has('nilai'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('nilai') }}
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