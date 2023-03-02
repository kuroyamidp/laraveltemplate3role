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
					<div class="table-responsive">
						<table class="table table-bordered" id="default-ordering">
							<thead>
								<tr style="text-align: center;">
									<th>No</th>
									<th>Tanggal pengajuan</th>
									<th>Semester</th>
									<th>Status</th>
									<th>Jadwal mata kuliah</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($krs as $key => $v)
								<tr style="text-align: center;">
									<td width="1%">{{$key + 1}}</td>
									<td>{{ \Carbon\Carbon::parse($v->created_at)->format('Y-m-d') }}</td>
									<td>{{$v->semester}}</td>
									<td>
										@if($v->status == 0)
										<span class="badge badge-info">Menunggu konfirmasi</span>
										@elseif($v->status == 1)
										<span class="badge badge-info">KRS di terima</span>
										@else
										<span class="badge badge-danger">KRS di tolak</span>
										@endif
									</td>
									<td>
										@foreach($v->jadwal as $ky => $val)
										<li>Mata kuliah : {{$val->matkul['matkul']}}</li>
										<li>Dosen : <b>{{$val->matkul['dosen']}}</b></li>
										@endforeach
									</td>
									<td>

										<form action="{{ route('krs.destroy', $v->uid) }}" method="post">
											@method('DELETE')
											@csrf
											<button class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete' type="submit"><i class="bx bx-trash"></i></button>
											<a href="{{ route('krs.show', $v->uid) }}" class="btn btn-warning" data-toggle="tooltip" title='Update'><i class="bx bx-edit"></i></a>
											<a href="{{ route('krs.edit', $v->uid) }}" class="btn btn-primary" data-toggle="tooltip" title='Show'><i class="bx bx-list-ul"></i></a>
											@if($v->status == 0 || $v->status == 1)
											<a href="/cetakkrs" class="btn btn-success" data-toggle="tooltip" title='Print'><i class="bx bx-printer"></i></a>
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
	</div>
	<script>
		function openClassListModal(jadJsn) {
			console.log(JSON.parse(jadJsn))
		}
	</script>
</div>
@endsection