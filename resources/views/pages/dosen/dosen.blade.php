@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Master Data</a></li>
            <li class="breadcrumb-item active">dosen</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dosen.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered datatable">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No</th>
                                <th>NUPTK</th>
                                <th>Guru</th>
                                <th>Wali Kelas</th>
                                <th>Jabatan Fungsional</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data-table-body">
                            @foreach($dosen as $key => $value)
                            <tr style="text-align: center;">
                                <td width="1%">{{$key + 1}}</td>
                                <td>{{$value->nidn}}</td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->progdi}} | {{$value->kelas}}
                                </td>
                                <td>{{$value->jabatan_fungsional}}</td>
                                <td>
                                    @if($value->image)
                                    <img src="{{ url('Image/'.$value->image) }}" alt="Image-{{ $value->dosen_id }}" style="width: 50px; height: 50px;">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td class="text-center" style="display: flex; justify-content: center;">
                                    <a href="{{ route('dosen.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1" style="border-radius: 4px; padding: 5px 10px;" data-toggle="tooltip" title='Update'>
                                        <i class="bx bx-edit bx-sm"></i>
                                    </a>
                                    <form action="{{ route('dosen.destroy', $value->uid) }}" method="post" class="delete-form" onsubmit="confirmDelete(event)">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger mb-1 mr-1" style="border-radius: 4px; padding: 5px 10px;" data-toggle="tooltip" title='Delete' type="submit">
                                            <i class="bx bx-trash bx-sm"></i>
                                        </button>
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
            var showUrlBase = "{{ route('dosen.show', '') }}";
            var destroyUrlBase = "{{ route('dosen.destroy', '') }}";

            // Function to update the table based on search
            function updateTable(search) {
                $.ajax({
                    url: '{{ route("search-dosen") }}',
                    type: 'GET',
                    data: {
                        search: search
                    },
                    success: function(response) {
                        $('#data-table-body').empty();
                        var nomor = 1;
                        var imageUrlBase = '{{ url("Image") }}/';

                        $.each(response, function(index, value) {
                            var row = '<tr style="text-align: center;">' +
                                '<td>' + nomor++ + '</td>' +
                                '<td>' + value.nidn + '</td>' +
                                '<td>' + value.nama + '</td>' +
                                '<td>' + (value.progdi ? '<span class="badge badge-success">' + value.progdi + ' | ' + value.kelas + '</span>' : '<span class="badge badge-warning">Progdi belum ditentukan</span>') + '</td>' +
                                '<td>' + value.jabatan_fungsional + '</td>' +
                                '<td>' + (value.image ? '<img src="' + imageUrlBase + value.image + '" alt="Image-' + value.dosen_id + '" style="width: 50px; height: 50px;">' : 'No Image') + '</td>' +
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

                        // Re-initialize tooltips and confirmation dialogs after updating the table
                        $('[data-toggle="tooltip"]').tooltip();
                        addEventListenersToActionButtons();
                    }
                });
            }

            $('#configform').submit(function(event) {
                event.preventDefault();
                var search = $('#dosen').val();
                updateTable(search);
            });

            // Function to add event listeners to action buttons
            // function addEventListenersToActionButtons() {
            //     $('.show_confirm').click(function(event) {
            //         var form = $(this).closest("form");
            //         event.preventDefault();
            //         swal({
            //             title: `Are you sure you want to delete this record?`,
            //             text: "If you delete this, it will be gone forever.",
            //             icon: "warning",
            //             buttons: true,
            //             dangerMode: true,
            //         }).then((willDelete) => {
            //             if (willDelete) {
            //                 form.submit();
            //             }
            //         });
            //     });
            // }

            // // Call the function to add event listeners when the page loads
            // addEventListenersToActionButtons();

            // Function to reset the form and reload the page
            window.resetForm = function() {
                document.getElementById("configform").reset();
                window.location = "{{ route('dosen.index') }}";
            }
        });
    </script>
    @endsection