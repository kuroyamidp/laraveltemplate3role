@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('daftarwisuda.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('daftarwisuda.update', $daftarwisuda['id'])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">NPM</label>
                                <input type="numbert" readonly class="form-control" name="npm" value="{{$daftarwisuda['npm']}}">

                                @if($errors->has('npm'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('npm') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="form-control">Nama</label>
                                <select class="selectpicker" data-live-search="true" name="mahasiswa">
                                <option value="">Pilih salah satu</option>
                                    @foreach($mahasiswa as $key => $value)
                                    @if($daftarwisuda['mahasiswa_id'] == $value->id)
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
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">Jam</label>
                                <input type="time" name="jam" class="form-control" value="{{$daftarwisuda['jam']}}">
                                @if($errors->has('jam'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('jam') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="form-control">Tanggal Sidang</label>
                                <input type="date" name="tanggal_sidang" class="form-control" placeholder="dd-mm-yyyy" value="{{$daftarwisuda['tanggal_sidang']}}">
                                @if($errors->has('tanggal_sidang'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('tanggal_sidang') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                <label for="form-control">File Akan Diganti->{{$daftarwisuda['file']}}</label>
                                <input type="file" value="" name="file" class="form-control">
                                @if($errors->has('file'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('file') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="form-control">File Akan Diganti->ganti{{$daftarwisuda['doc']}}</label>
                                <input type="file" value="" name="doc" class="form-control">
                                @if($errors->has('doc'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('doc') }}
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