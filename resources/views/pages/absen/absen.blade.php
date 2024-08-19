@extends('layouts.main')

@section('content')

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<div class="layout-px-spacing">
    <div class="row">
        <div class="col-lg-12">
            @if(Auth::user()->role_id != 0 && Auth::user()->role_id != 2)
            <form id="configform" action="{{ route('search-absensi') }}" method="get">
                @csrf
                <div class="row mb-1 mt-1">
                    <div class="col-lg-3">
                        <label for="absensi">Absensi</label>
                        <input type="text" class="form-control" name="absensi" id="absensi" placeholder="Cari Absen">
                        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                        <button type="button" onclick="resetForm()" class="btn btn-warning btn-sm">Reset</button>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </form>
        </div>
    </div>
    @endif
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
            @if(Auth::user()->role_id != 0 && Auth::user()->role_id != 1)
                <div class="card-header">
                    <a href="{{ route('absensi.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="kelas-table">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        @if(Auth::user()->role_id != 2)
                                        <th>Foto</th>
                                        @endif
                                        @if(Auth::user()->role_id != 0 && Auth::user()->role_id != 1)
                                        <th>Foto</th>
                                        @endif
                                        <th>NISN</th>
                                        <th>Jurusan</th>
                                        <th>Kelas</th>
                                        <th>Siswa</th>
                                        <th>Hari</th>
                                        <th>Status</th>
                                        @if(Auth::user()->role_id != 2)
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="text-center" id="data-table-body">
                                    @foreach($absen as $key => $value)
                                    <tr>
                                        <td width="1%">{{ $key + 1 }}</td>
                                        @if(Auth::user()->role_id != 2)
                                        <td>
                                            @if($value->image)
                                            <img src="{{ url('Image/'.$value->image) }}" alt="Absensi-Image-{{ $value->uid }}" style="width: 50px; height: 50px;">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                        @endif
                                        @if(Auth::user()->role_id != 0 && Auth::user()->role_id != 1)
                                        <td>
                                            @if($value->absensi_image)
                                            <img src="{{ url('Image/'.$value->absensi_image) }}" alt="Absensi Image" style="width: 50px; height: 50px;">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                        @endif
                                        <td>{{ $value->kode_absen }}</td>
                                        <td>{{ $value->progdi }}</td>
                                        <td><b>KELAS </b>{{ $value->kelas }}</td>
                                        <td>{{ $value->mahasiswa }}</td>
                                        <td>{{ $value->hari }}</td>
                                        <td>
                                            @if($value->status_absensi == 0)
                                            <span class="badge badge-danger">Alpha</span>
                                            @elseif($value->status_absensi == 1)
                                            <span class="badge badge-primary">Masuk</span>
                                            @elseif($value->status_absensi == 2)
                                            <span class="badge badge-primary">Ijin</span>
                                            @else
                                            <span class="badge badge-danger">Sakit</span>
                                            @endif
                                        </td>
                                        @if(Auth::user()->role_id != 2)
                                        <td>
                                            <a href="https://www.google.com/maps/search/?api=1&query={{ $value->latitude }},{{ $value->longitude }}" target="_blank">
                                                Buka Map
                                            </a>
                                        </td>
                                        @endif
                                        @if(Auth::user()->role_id != 2)
                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('absensi.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>
                                            @if(Auth::user()->role_id != 1)
                                            <form class="delete-form" action="{{ route('absensi.destroy', $value->uid) }}" method="post" style="display:inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title="Delete" type="submit"><i class="bx bx-trash bx-sm"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                        @endif
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

<script>
    $(document).ready(function() {
        var showUrlBase = "{{ route('absensi.show', '') }}";
        var destroyUrlBase = "{{ route('absensi.destroy', '') }}";

        function updateTable(search) {
            $.ajax({
                url: '{{ route("search-absensi") }}',
                type: 'GET',
                data: {
                    search: search
                },
                success: function(response) {
                    $('#data-table-body').empty();
                    var nomor = 1;
                    var imageUrlBase = '{{ url("Image") }}/';

                    $.each(response, function(index, value) {
                        var imageHtml = value.image ? '<img src="' + imageUrlBase + value.image + '" alt="Image-' + value.mahasiswa_id + '" style="width: 50px; height: 50px;">' : 'No Image';

                        var row = '<tr style="text-align: center;">' +
                            '<td>' + nomor++ + '</td>' +
                            '<td>' + imageHtml + '</td>' +
                            '<td>' + value.kode_absen + '</td>' +
                            '<td>' + value.progdi + '</td>' +
                            '<td><b>KELAS </b>' + value.kelas + '</td>' +
                            '<td>' + value.mahasiswa + '</td>' +
                            '<td>' + value.hari + '</td>' +
                            '<td>' + (value.status_absensi == 0 ? '<span class="badge badge-danger">Alpha</span>' : (value.status_absensi == 1 ? '<span class="badge badge-primary">Masuk</span>' : (value.status_absensi == 2 ? '<span class="badge badge-primary">Ijin</span>' : '<span class="badge badge-danger">Sakit</span>'))) + '</td>' +
                            '<td>' + (value.latitude ? '<a href="https://www.google.com/maps/search/?api=1&query=' + value.latitude + ',' + value.longitude + '" target="_blank">Buka Map</a>' : '-') + '</td>' +
                            '<td class="text-center" style="display: flex; justify-content: center;">' +
                            '<a href="' + showUrlBase + '/' + value.uid + '" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>' +
                            '<form class="delete-form" action="' + destroyUrlBase + '/' + value.uid + '" method="post" style="display:inline;">' +
                            '@method("DELETE")' +
                            '@csrf' +
                            '<button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title="Delete" type="submit"><i class="bx bx-trash bx-sm"></i></button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>';

                        $('#data-table-body').append(row);
                    });

                    $('[data-toggle="tooltip"]').tooltip();
                    addEventListenersToActionButtons();
                }
            });
        }

        $('#configform').submit(function(event) {
            event.preventDefault();
            var search = $('#absensi').val();
            updateTable(search);
        });

        // function addEventListenersToActionButtons() {
        //     $('.show_confirm').click(function(event) {
        //         var form = $(this).closest("form");
        //         event.preventDefault();
        //         swal({
        //             title: "Are you sure you want to delete this record?",
        //             text: "If you delete this, it will be gone forever.",
        //             icon: "warning",
        //             buttons: true,
        //             dangerMode: true,
        //         }).then((willDelete) => {
        //             if (willDelete) {
        //                 form.submit(); // Submit the form if user confirms
        //             }
        //         });
        //     });
        // }

        // addEventListenersToActionButtons();

        window.resetForm = function() {
            document.getElementById("configform").reset();
            window.location = "{{ route('absensi.index') }}";
        }
    });
</script>

@endsection