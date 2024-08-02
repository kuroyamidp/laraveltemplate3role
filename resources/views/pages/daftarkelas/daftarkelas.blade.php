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

    @if(isset($conflicts) && !empty($conflicts))
        <div class="alert alert-danger">
            <strong>Perhatian!</strong> Terdapat konflik dalam jadwal:
            <ul>
                @foreach($conflicts as $conflict)
                    <li>
                        Kode Kelas: {{ $conflict['kode_kelas'] }},
                        Program Studi: {{ $conflict['progdi'] }},
                        Mata Kuliah: {{ $conflict['mata_kuliah'] }},
                        Ruang: {{ $conflict['ruang'] }},
                        Dosen: {{ $conflict['dosen'] }},
                        Hari: {{ $conflict['hari'] }},
                        Waktu: {{ $conflict['waktu'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

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
                                        <td>{{ $value->matkul }}</td> <!-- Pastikan model Matakuliah memiliki relasi -->
                                        <td>{{ $value->progdi }}</td> <!-- Pastikan model Progdi memiliki relasi -->
                                        <td>{{ $value->ruang }}</td> <!-- Pastikan model Ruang memiliki relasi -->
                                        <td>{{ $value->dosen }}</td> <!-- Pastikan model Dosen memiliki relasi -->
                                        <td>{{ $value->start }}</td>
                                        <td>{{ $value->hari }}</td>
                                        <td><b>KELAS </b>{{ $value->kelas }}</td>
                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('daftar-kelas.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>
                                            <button onclick="confirmOptimize('{{ route('optimize-schedule', ['id' => $value->id]) }}')" class="btn btn-success mb-1 mr-1 rounded-circle btn-optimize" data-toggle="tooltip" title="Optimize"><i class="bx bx-cog bx-sm"></i></button>
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

<script>
function confirmOptimize(optimizeUrl) {
    if (confirm("Apakah Anda yakin ingin mengoptimalkan jadwal?")) {
        window.location.href = optimizeUrl;
    }
}

function resetForm() {
    document.getElementById("configform").reset();
}

// Initialization and event handling
$(document).ready(function() {
    var showUrlBase = "{{ route('dosen.show', '') }}";
    var destroyUrlBase = "{{ route('dosen.destroy', '') }}";
    var optimizeUrlBase = "{{ route('optimize-schedule', '') }}"; // Define the base URL for optimization

    function updateTable(search) {
        $.ajax({
            url: '{{ route("search-kelas-matkul") }}',
            type: 'GET',
            data: { search },
            success: function(response) {
                $('#data-table-body').empty();
                var nomor = 1;

                $.each(response, function(index, value) {
                    var row = '<tr style="text-align: center;">' +
                        '<td>' + nomor++ + '</td>' +
                        '<td>' + value.kode_kelas + '</td>' +
                        '<td>' + value.matkul + '</td>' +
                        '<td>' + value.progdi + '</td>' +
                        '<td>' + value.ruang + '</td>' +
                        '<td>' + value.dosen + '</td>' +
                        '<td>' + value.start + '</td>' +
                        '<td>' + value.hari + '</td>' +
                        '<td>' + value.kelas + '</td>' +
                        '<td class="text-center" style="display: flex; justify-content: center;">' +
                            '<a href="' + showUrlBase + '/' + value.uid + '" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>' +
                            '<button onclick="confirmOptimize(\'' + optimizeUrlBase + '/' + value.uid + '\')" class="btn btn-success mb-1 mr-1 rounded-circle btn-optimize" data-toggle="tooltip" title="Optimize"><i class="bx bx-cog bx-sm"></i></button>' +
                            '<form action="' + destroyUrlBase + '/' + value.uid + '" method="post" style="display:inline;">' +
                            '@method("DELETE")' +
                            '@csrf' +
                            '<button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title="Delete" type="submit"><i class="bx bx-trash bx-sm"></i></button>' +
                            '</form>' +
                        '</td>' +
                        '</tr>';

                    $('#data-table-body').append(row);
                });

                // Re-initialize tooltips and confirmation dialogs after updating the table
                $('[data-toggle="tooltip"]').tooltip();
                addEventListenersToActionButtons();
            }
        });
    }

    $('#configform').submit(function(event) {
        event.preventDefault();
        var search = $('#daftar_kelas').val();
        updateTable(search);
    });

    // Function to add event listeners to action buttons
    function addEventListenersToActionButtons() {
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
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

    // Call the function to add event listeners when the page loads
    addEventListenersToActionButtons();

    // Function to reset the form and reload the page
    window.resetForm = function() {
        document.getElementById("configform").reset();
        window.location = "{{ route('daftar-kelas.index') }}";
    }
});
</script>


@endsection