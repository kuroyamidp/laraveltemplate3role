@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode Mapel</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Rincian mata kuliah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matkul as $key => $value)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td>{{$value->kode_mk}}</td>
                                        <td>{{$value->nama}}</td>
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