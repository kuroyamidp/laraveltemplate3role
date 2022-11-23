@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('krs.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('krs.store')}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <label for="form-control">Semester</label>
                                <select class="selectpicker" data-live-search="true" name="semester">
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
                                @foreach($jdw as $key => $value)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="4" class="text-center text-uppercase">{{$key}}</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Check</th>
                                            <th>Mata kuliah</th>
                                            <th>Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($value as $ky => $val)
                                        <tr class="text-center">
                                            <td width="1%">
                                                <div class="n-chk">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                        <input type="checkbox" class="new-control-input" name="jadwal_id[]">
                                                        <span class="new-control-indicator"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{$val->matkul['matkul']}} - <b> SEMESTER {{$val->semester}}</b></td>
                                            <td>{{$val->jam}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endforeach
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