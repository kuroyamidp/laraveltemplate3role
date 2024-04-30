@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content">
                    <a href="{{route('user-dosen.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('user-dosen.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <label for="form-control">Guru</label>
                                <select class="selectpicker" data-live-search="true" id="dsn" name="dosen" onchange="getnamedosen()">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($dosen as $key => $value)
                                    <option value="{{$value}}"><b>{{$value->nidn}} - {{$value->nama}}</b> </option>
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
                                <label for="form-control">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                                @if($errors->has('username'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('username') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Email</label>
                                <input type="email" class="form-control" name="email">
                                @if($errors->has('email'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Password</label>
                                <input type="password" class="form-control" id="username" name="password">
                                @if($errors->has('password'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection