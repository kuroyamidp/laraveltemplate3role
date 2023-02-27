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
							<tr style="text-align: center;">
								<th>Semester</th>
								<th>Status</th>
								<th>Jumlah Makul</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($krs as $v)
							<tr style="text-align: center;">
								<td>{{$v->semester}}</td>
								<td>{{$v->status}}</td>
								<td>{{count(json_decode($v->jadwal_id))}}</td>
								<td>

									<form action="{{ route('krs.destroy', $v->uid) }}" method="post">
										@method('DELETE')
										@csrf
										<button class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete' type="submit"><i class="bx bx-trash"></i></button>
										<a href="{{ route('krs.show', $v->uid) }}" class="btn btn-warning" data-toggle="tooltip" title='Update'><i class="bx bx-edit"></i></a>
										<a href="{{ route('krs.edit', $v->uid) }}" class="btn btn-secondary" data-toggle="tooltip" title='Update'><i class="bx bx-edit"></i></a>
										@if($v->status == 0)
										<a href="/cetakkrs" class="btn btn-success" data-toggle="tooltip"><i class="bx bx-printer"></i></a>
										@endif

									</form>


									<!-- <button type="button" class="btn btn-danger"><i class="bx bx-trash"></i></button> -->

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