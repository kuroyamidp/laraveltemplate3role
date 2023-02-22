@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row">
        <div class="col-lg-12">
            <form id="configform" action="{{route('semesterini.index')}}" method="get">
                @csrf
                <div class="row mb-1 mt-1">
                    <div class="col-lg-3">


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header" style="background-color: white;">
                        <a href="/cetakjadwalsemester" class="btn btn-success btn-sm">Print</a>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered" id="default-ordering">
                                @foreach($jdw as $key => $value)
                                <thead>
                                    <tr>
                                        <th colspan="4" class="text-center text-uppercase">{{$key}}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Mata kuliah</th>
                                        <th class="text-center">Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1; // Inisialisasi variabel $i dengan nilai 1
                                    @endphp
                                    @foreach($value as $val)
                                    @if($val->semester == 5)
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td>{{ $val->matkul['matkul'] }} - <b>SEMESTER {{ $val->semester }}</b></td>
                                        <td class="text-center">{{ $val->jam }}</td>
                                    </tr>
                                    @php
                                    $i++; // Tambah nilai variabel $i setiap kali data semester 5 ditampilkan
                                    @endphp
                                    @endif
                                    @endforeach
                                </tbody>

                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection