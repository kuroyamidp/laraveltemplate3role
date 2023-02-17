@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Mata kuliah</th>
                                        <th>Rincian mata kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matkul as $key => $value)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td>{{$value->nama}} [ {{$value->kode_mk}} ]</td>
                                        <td>
                                            <li>SKS : {{$value->sks}}</li>
                                            <li>Mutu : {{$value->mutu}}</li>
                                            <li>Bobot :{{$value->bobot}} </li>

                                        </td>
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