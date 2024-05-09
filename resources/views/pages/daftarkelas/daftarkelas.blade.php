@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row">
        <div class="col-lg-12">
            <form id="configform" action="{{ route('daftar-kelas.index') }}" method="get">
                @csrf
                <div class="row mb-1 mt-1">
                    <div class="col-lg-3">
                        <label for="kode_kelas">Kode Jadwal</label> <!-- Ubah label -->
                        <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" placeholder="Cari berdasarkan Kode Kelas"> <!-- Ubah tipe input dan nama -->
                        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                        <button type="reset" onclick="reset()" class="btn btn-warning btn-sm">Reset</button>
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
    // $(document).ready(function() {
    //     // Fungsi untuk memperbarui tabel berdasarkan pencarian
    //     function updateTable(search) {
    //         $.ajax({
    //             url: '{{ route("search-kelas-matkul") }}',
    //             type: 'GET',
    //             data: {
    //                 search: search
    //             },
    //             success: function(response) {
           
    //                 $('#data-table-body').empty();

             
    //                 var nomor = 1;

            
    //                 $.each(response, function(key, value) {
    //                    isi form edit dan delet
    //             </td>`;

    //                     var row = '<tr>' +
    //                         '<td>' + nomor++ + '</td>' +
    //                         '<td>' + value.kode_kelas + '</td>' +
    //                         '<td>' + value.matkul + '</td>' +
    //                         '<td>' + value.progdi + '</td>' +
    //                         '<td>' + value.ruang + '</td>' +
    //                         '<td>' + value.dosen + '</td>' +
    //                         '<td>' + value.start + ' - ' + value.end + '</td>' +
    //                         '<td>' + value.hari + '</td>' +
    //                         '<td>KELAS ' + value.kelas + '</td>' +
    //                         actions + // Tambahkan aksi ke baris data
    //                         '</tr>';

    //                     $('#data-table-body').append(row);
    //                 });
    //             }


    //         });
    //     }

 
    //     updateTable('');


    //     $('#configform').submit(function(e) {
    //         e.preventDefault();
    //         var search = $('#kode_kelas').val();
    //         updateTable(search);
    //     });
    // });

</script>

@endsection