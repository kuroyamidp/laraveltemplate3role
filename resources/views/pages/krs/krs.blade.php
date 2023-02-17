@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('krs.create')}}" class="btn btn-primary btn-sm">Tambah</a>
					<a href="/cetakkrs" class="btn btn-success btn-sm">Print</a>
                </div>
                <div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr style="text-align: center;">
								<th>Semester</th>
								<th>Jumlah Makul</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($krs as $v)
							<tr style="text-align: center;">
								<td>{{$v->semester}}</td>
								<td>{{count(json_decode($v->jadwal_id))}}</td>
								<td>
										<form action="{{ route('krs.destroy', $v->uid) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger show_confirm"><i class="bx bx-trash"></i></button>
												<button type="button" onclick="openClassListModal('{{json_encode($v->jadwal)}}')" class="btn btn-info"><i class="bx bx-list-ol"></i></button>
												@if (Auth::user()->mahasiswa->semester_berjalan < $v->semester)
												<a href="{{ route('krs.show', $v->uid) }}" class="btn btn-warning" data-toggle="tooltip" title='Update'><i class="bx bx-edit"></i></a>
                                            </form>
										
											
										<!-- <button type="button" class="btn btn-danger"><i class="bx bx-trash"></i></button> -->
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