@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('user-dosen.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('user-dosen.update', $dsn['uid'])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <label for="form-control">Guru</label>
                                <input type="hidden" name="userid" value="{{$dsn['uid']}}">
                                <input type="hidden" name="id" value="{{$dsn['id']}}">
                                <select class="selectpicker" data-live-search="true" id="dsn" name="dosen" onchange="getnamemadosen()">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($dosen as $key => $value)
                                    @if($value->user_id == $dsn['id'])
                                    <option value="{{$value}}" selected><b>{{$value->nidn}} - {{$value->nama}}</b> </option>
                                    @else
                                    <option value="{{$value}}"><b>{{$value->nidn}} - {{$value->nama}}</b> </option>
                                    @endif
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
                                <input type="text" class="form-control" id="username" name="username" value="{{$dsn['name']}}">
                                @if($errors->has('username'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('username') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$dsn['email']}}">
                                @if($errors->has('email'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <label for="form-control">Password</label>
                                <input type="password" class="form-control" id="username" name="password">
                                <small class="badge badge-info">Kosongkan apabila tidak meperbarui password</small>
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