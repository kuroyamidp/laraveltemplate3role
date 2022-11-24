@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('krs.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Semester</th>
								<th>Jumlah Makul</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($krs as $v)
							<tr>
								<td>{{$v->semester}}</td>
								<td>{{count(json_decode($v->jadwal_id))}}</td>
								<td>
									<button type="button" onclick="openClassListModal('{{json_encode($v->jadwal)}}')" class="btn btn-info"><i class="bx bx-list-ol"></i></button>
									@if (Auth::user()->mahasiswa->semester_berjalan < $v->semester)
										<button type="button" class="btn btn-warning"><i class="bx bx-edit"></i></button>
										<button type="button" class="btn btn-danger"><i class="bx bx-trash"></i></button>
									@endif	
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
	<script>
		function openClassListModal(jadJsn) {
			console.log(JSON.parse(jadJsn))
		}
	</script>
</div>
@endsection