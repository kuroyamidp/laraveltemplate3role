@extends('layouts.main')

@section('content')
<div class="pagetitle">
  <h1>Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Master Data</a></li>
      <li class="breadcrumb-item active">Mahasiswa</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">Tambah</a>
        </div>

        <div class="table-responsive">
          <table class="table table-striped table-bordered datatable">
            <thead class="thead-light">
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
                <td>{{ $value->progdi }}</td>
                <td>{{ $value->kelas }}</td>
                <td>
                  @if($value->image)
                  <img src="{{ url('Image/'.$value->image) }}" alt="Image-{{ $value->mahasiswa_id }}" style="width: 25px; height: 25px; border-radius: 50%;">
                  @else
                  No Image
                  @endif
                </td>
                <td class="text-center" style="display: flex; justify-content: center;">
                  <a href="{{ route('mahasiswa.show', $value->uid) }}" class="btn btn-warning mb-1 mr-1" style="border-radius: 4px; padding: 5px 10px;" data-toggle="tooltip" title='Update'>
                    <i class="bx bx-edit bx-sm"></i>
                  </a>
                  <form action="{{ route('mahasiswa.destroy', $value->uid) }}" method="post" class="delete-form" onsubmit="confirmDelete(event)">
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
</section>
@endsection
