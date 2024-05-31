@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Jadwal yang Dioptimalkan</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode kelas</th>
                                <th>Mapel</th>
                                <th>Jurusan</th>
                                <th>Ruang</th>
                                <th>Guru</th>
                                <th>Waktu</th>
                                <th>Hari</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if(is_array($schedule) && count($schedule) > 0)
                            @foreach($schedule as $key => $value)
                            <tr>
                                <td>{{ intval($key) + 1 }}</td>
                                <td>{{ $value['kode_kelas'] }}</td>
                                <td>{{ $value['matkul'] }}</td>
                                <td>{{ $value['progdi'] }}</td>
                                <td>{{ $value['ruang'] }}</td>
                                <td>{{ $value['dosen'] }}</td>
                                <td>{{ $value['waktu'] }}</td>
                                <td>{{ $value['hari'] }}</td>
                                <td>{{ $value['kelas'] }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="9">Data tidak tersedia</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
