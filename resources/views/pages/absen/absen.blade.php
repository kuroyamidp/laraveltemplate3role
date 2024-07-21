@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row">
        <div class="col-lg-12">
        <form id="configform" action="{{ route('search-absensi') }}" method="get">
                @csrf
                <div class="row mb-1 mt-1">
                    <div class="col-lg-3">
                        <label for="absensi">Absensi</label>
                        <input type="text" class="form-control" name="absensi" id="absensi" placeholder="Cari Absen">
                        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                        <button type="button" onclick="resetForm()" class="btn btn-warning btn-sm">Reset</button>
                    </div>

                    <div class="col-lg-3">

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                @if(Auth::user()->role_id != 1)
                    <a href="{{ route('absensi.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="kelas-table">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Jurusan</th>
                                        <th>Kelas</th>
                                        <th>Siswa</th>
                                        <th>hari</th>
                                        <th>Status</th>
                                        <!-- Pindahkan pengecekan ke sini -->
                                        @if(Auth::user()->role_id != 2 && Auth::user()->role_id != 1) <!-- Hanya tampilkan aksi jika pengguna bukan dosen (id 2) atau admin (id 1) -->
                                        <th>aksi</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody class="text-center" id="data-table-body">
                                    @foreach($absen as $key => $value)
                                    <tr>
                                        <td width="1%">{{ $key + 1 }}</td>
                                        <td>{{ $value->kode_absen }}</td>
                                        <td>{{ $value->progdi}}</td>
                                        <td><b>KELAS </b>{{ $value->kelas }}</td>
                                        <td>{{ $value->mahasiswa}}</td>
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
                                        <!-- Pindahkan pengecekan ke sini -->
                                        @if(Auth::user()->role_id != 2 && Auth::user()->role_id != 1)
                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('absensi.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>
                                            <form action="{{ route('absensi.destroy', $value->uid) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title="Delete" type="submit"><i class="bx bx-trash bx-sm"></i></button>
                                            </form>
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
<div>
<!-- <script>
   $(document).ready(function() {
    $('#configform').on('submit', function(event) {
        event.preventDefault();
        updateTable($('#absensi').val());
    });

    function updateTable(search) {
        $.ajax({
            url: '{{ route("search-absensi") }}',
            type: 'GET',
            data: { search },
            success: function(response) {
                $('#data-table-body').empty();
                response.forEach((value, index) => {
                    $('#data-table-body').append(buildRow(value, index + 1));
                });
                $('[data-toggle="tooltip"]').tooltip();
                addEventListenersToActionButtons();
            }
        });
    }

    function buildRow(value, nomor) {
        const statusBadges = {
            0: 'badge-danger',
            1: 'badge-primary',
            2: 'badge-primary',
            3: 'badge-danger'
        };
        const statusTexts = {
            0: 'Alpha',
            1: 'Masuk',
            2: 'Ijin',
            3: 'Sakit'
        };
        let row = `<tr>
            <td>${nomor}</td>
            <td>${value.kode_absen}</td>
            <td>${value.progdi}</td>
            <td>KELAS ${value.kelas}</td>
            <td>${value.mahasiswa}</td>
            <td>${value.hari}</td>
            <td><span class="badge ${statusBadges[value.status_absensi]}">${statusTexts[value.status_absensi]}</span></td>
        `;
        if (!['2', '1'].includes('{{ Auth::user()->role_id }}')) {
            row += `<td class="text-center" style="display: flex; justify-content: center;">
                <a href="{{ route('absensi.show', '') }}/${value.uid}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>
                <form action="{{ route('absensi.destroy', '') }}/${value.uid}" method="post" style="display:inline;">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title="Delete" type="submit"><i class="bx bx-trash bx-sm"></i></button>
                </form>
                </td>`;
        }
        row += `</tr>`;
        return row;
    }

    function addEventListenersToActionButtons() {
        $('.show_confirm').on('click', function(event) {
            const form = $(this).closest("form");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    }

    window.resetForm = function() {
        $('#configform').trigger("reset");
        updateTable('');
    }

    // Initialize the table with all records
    updateTable('');
});

</script> -->


    @endsection