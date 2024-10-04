@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Master Data</a></li>
            <li class="breadcrumb-item active">ruangkelas</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('ruangkelas.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered datatable">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode ruang kelas</th>
                                <th>Nama ruang kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ruang as $key => $value)
                            <tr style="text-align: center;">
                                <td width="1%">{{$key + 1}}</td>
                                <td>{{$value->kode_ruang}}</td>
                                <td>{{$value->nama}}</td>
                                <td class="text-center" style="display: flex; justify-content: center;">
                                    <a href="{{ route('ruangkelas.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1" style="border-radius: 4px; padding: 5px 10px;" data-toggle="tooltip" title='Update'>
                                        <i class="bx bx-edit bx-sm"></i>
                                    </a>
                                    <form action="{{ route('ruangkelas.destroy', $value->uid) }}" method="post" class="delete-form" onsubmit="confirmDelete(event)">
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
    @endsection