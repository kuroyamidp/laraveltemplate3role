@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
    <div class="row">
        <div class="col-lg-12">
            <form id="configform" action="{{ route('search-mahasiswa') }}" method="get">
                @csrf
                <div class="row mb-1 mt-1">
                    <div class="col-lg-3">
                        <label for="mahasiswa">Siswa</label>
                        <input type="text" class="form-control" name="mahasiswa" id="mahasiswa" placeholder="Cari siswa">
                        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                        <button type="button" onclick="resetForm()" class="btn btn-warning btn-sm">Reset</button>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="default-ordering">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>NISN</th>
                                        <th>Siswa</th>
                                        <th>Jurusan</th>
                                        <th>Kelas</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="data-table-body">
                                    @foreach($mahasiswa as $key => $value)
                                    <tr style="text-align: center;">
                                        <td width="1%">{{ $key + 1 }}</td>
                                        <td>{{ $value->nis }}</td>
                                        <td>{{ $value->nim }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>
                                            @if($value->progdi == null)
                                            <span class="badge badge-warning">Progdi belum ditentukan</span>
                                            @else
                                            <span class="badge badge-success">{{ $value->progdi }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $value->kelas }}</td>
                                        <td>
                                            @if($value->image)
                                            <img src="{{ url('Image/'.$value->image) }}" alt="Image-{{ $value->mahasiswa_id }}" style="width: 50px; height: 50px;">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                        <td class="text-center" style="display: flex; justify-content: center;">
                                            <a href="{{ route('mahasiswa.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title='Update'><i class="bx bx-edit bx-sm"></i></a>
                                            <form action="{{ route('mahasiswa.destroy', $value->uid) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title='Delete' type="submit"><i class="bx bx-trash bx-sm"></i></button>
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
$(document).ready(function() {
    var showUrlBase = "{{ route('mahasiswa.show', '') }}";
    var destroyUrlBase = "{{ route('mahasiswa.destroy', '') }}";

    function updateTable(search) {
        $.ajax({
            url: '{{ route("search-mahasiswa") }}',
            type: 'GET',
            data: { search: search },
            success: function(response) {
                $('#data-table-body').empty();
                var nomor = 1;

                $.each(response, function(index, value) {
                    var row = '<tr style="text-align: center;">' +
                        '<td>' + nomor++ + '</td>' +
                        '<td>' + value.nis + '</td>' +
                        '<td>' + value.nim + '</td>' +
                        '<td>' + value.nama + '</td>' +
                        '<td>' + (value.progdi ? '<span class="badge badge-success">' + value.progdi + '</span>' : '<span class="badge badge-warning">Progdi belum ditentukan</span>') + '</td>' +
                        '<td>' + value.kelas + '</td>' +
                        '<td>' + value.image + '</td>' +
                        '<td class="text-center" style="display: flex; justify-content: center;">' +
                        '<a href="' + showUrlBase + '/' + value.uid + '" class="btn btn-warning mb-1 mr-1 rounded-circle" data-toggle="tooltip" title="Update"><i class="bx bx-edit bx-sm"></i></a>' +
                        '<form action="' + destroyUrlBase + '/' + value.uid + '" method="post" style="display:inline;">' +
                        '@method("DELETE")' +
                        '@csrf' +
                        '<button class="btn btn-danger mb-1 mr-1 rounded-circle show_confirm" data-toggle="tooltip" title="Delete" type="submit"><i class="bx bx-trash bx-sm"></i></button>' +
                        '</form>' +
                        '</td>' +
                        '</tr>';

                    $('#data-table-body').append(row);
                });

                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    }

    $('#configform').submit(function(event) {
        event.preventDefault();
        var search = $('#mahasiswa').val();
        updateTable(search);
    });

    // $(document).on('click', '.show_confirm', function(event) {
    //     var form = $(this).closest("form");
    //     event.preventDefault();
    //     swal({
    //         title: "Are you sure you want to delete this record?",
    //         text: "If you delete this, it will be gone forever.",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     }).then((willDelete) => {
    //         if (willDelete) {
    //             form.submit();
    //         }
    //     });
    // });

    window.resetForm = function() {
        document.getElementById("configform").reset();
        window.location = "{{ route('mahasiswa.index') }}";
    }
});
</script>

@endsection
