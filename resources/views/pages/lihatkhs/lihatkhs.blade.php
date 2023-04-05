@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="/cetaknilaiujian" class="btn btn-success btn-sm">Print</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Mahasiswa</th>
                                        <th>Mata Kuliah</th>
                                        <th>Nilai Ujian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no=1
                                @endphp
                                @foreach ($nilaiujian as $v)
                                <tr style="text-align: center;">
                                    <td width="1%">{{$no++}}</td>
                                    <td>{{$v->mahasiswa}}</td>
                                    <td>{{$v->matkul}}</td>
                                    <td>{{$v->nilai}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection