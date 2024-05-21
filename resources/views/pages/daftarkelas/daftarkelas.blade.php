@extends('layouts.main')

@section('content')
<style>
    .btn-optimize {
        background-color: #28a745;
        /* Hijau */
        color: white;
        border: none;
    }

    .btn-optimize:hover {
        background-color: #218838;
        /* Hijau lebih gelap saat hover */
        color: white;
    }
</style>


<div class="layout-px-spacing">
    <div class="row">
        <div class="col-lg-12">
            <form id="configform" action="{{ route('search-kelas-matkul') }}" method="get">
                @csrf
                <div class="row mb-1 mt-1">
                    <div class="col-lg-3">
                        <label for="daftar_kelas">Kode Jadwal</label>
                        <input type="text" class="form-control" name="daftar_kelas" id="daftar_kelas" placeholder="Cari Jadwal">
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
                    <a href="{{ route('daftar-kelas.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="kelas-table">
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" id="data-table-body"> <!-- Tambahkan ID untuk dapat menambahkan baris -->
                                    @php $nomor = 1; @endphp <!-- Gunakan PHP untuk inisialisasi nomor -->
                                    @foreach($kelas as $key => $value)
                                    <tr>
                                        <td width="1%">{{ $nomor++ }}</td> <!-- Gunakan variabel nomor yang diberikan oleh PHP -->
                                        <td>{{ $value->kode_kelas }}</td>
                                        <td>{{ $value->matkul }}</td>
                                        <td>{{ $value->progdi }}</td>
                                        <td>{{ $value->ruang }}</td>
                                        <td>{{ $value->dosen }}</td>
                                        <td>{{ $value->start }} - {{ $value->end }}</td>
                                        <td>{{ $value->hari }}</td>
                                        <td><b>KELAS </b>{{ $value->kelas }}</td>
                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('daftar-kelas.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>
                                            <a href="{{ route('optimize-schedule', ['id' => $value->id]) }}" class="btn btn-success mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Optimize"><i class="bx bx-cog bx-sm"></i></a>
                                            <form action="{{ route('daftar-kelas.destroy', $value->uid) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title="Delete" type="submit"><i class="bx bx-trash bx-sm"></i></button>
                                            </form>
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
<!-- <script>
    //tes
    $(document).ready(function() {
        $('#configform').on('submit', function(event) {
            event.preventDefault();
            updateTable($('#daftar_kelas').val());
        });

        function updateTable(search) {
            $.ajax({
                url: '{{ route("search-kelas-matkul") }}',
                type: 'GET',
                data: {
                    search
                },
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
            let row = `<tr>
            <td>${nomor}</td>
            <td>${value.kode_kelas}</td>
            <td>${value.matkul}</td>
            <td>${value.progdi}</td>
            <td>${value.ruang}</td>
            <td>${value.dosen}</td>
            <td>${value.start + value.end}</td>
            <td>${value.hari}</td>
            <td>Kelas ${value.kelas}</td>
        `;

            row += `<td class="text-center" style="display: flex; justify-content: center;">
                <a href="{{ route('daftar-kelas.show', '') }}/${value.uid}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>
                <form action="{{ route('daftar-kelas.destroy', '') }}/${value.uid}" method="post" style="display:inline;">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title="Delete" type="submit"><i class="bx bx-trash bx-sm"></i></button>
                </form>
                </td>`;

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