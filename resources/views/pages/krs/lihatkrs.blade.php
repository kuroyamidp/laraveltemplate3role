@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('krs.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('krs.store')}}" method="post">
                        @csrf
						<input type="hidden" name="hdn_semester" value="{{Auth::user()->mahasiswa->semester_berjalan+1}}">
                        {{-- <div class="row mb-1">
                            <div class="col-lg-12">
                                <label for="form-control">Semester</label>
                                <select class="selectpicker" data-live-search="true" name="semester">
                                    <option value="">Pilih salah satu</option>
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                </select>
                                @if($errors->has('semester'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('semester') }}
                                </div>
                                @endif
                            </div>
                        </div> --}}
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                @foreach($jdw as $key => $value)
                                <table class="table table-bordered table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="text-center text-uppercase">{{$key}}</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th style="text-align: left;">Mata kuliah</th>
                                            <th style="text-align: right;">Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($value as $ky => $val)
                                        <tr class="text-center makulrow" onclick="checkCheckboxJadwal({{$val->id}})" jadwal-day="{{$key}}" row-jadwal-id="{{$val->id}}" time-start="{{$val->matkul->start}}" time-end="{{$val->matkul->end}}">
                                            <td style="text-align: left;">{{$val->matkul['matkul']}} - <b> SEMESTER {{$val->semester}}</b></td>
                                            <td style="text-align: right;">{{$val->jam}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<script>
		function checkCheckboxJadwal(id) {
    var elm = $('input[checkbox-jadwal-id="' + id + '"');
    var strTime = timeTo24HoursSecond(elm.attr('time-start'));
    var endTime = timeTo24HoursSecond(elm.attr('time-end'));
    if (elm.prop('checked')) {
        elm.prop('checked', false).trigger('change');
    } else {
        elm.prop('checked', true).trigger('change');
    }
		}

		function timeTo24HoursSecond(time) {
			var expTime = time.split(':');
			var scd = Number(expTime[0])*3600+Number(expTime[1])*60+Number(expTime[2]);
			return scd;
		}

		$(document).ready(function () {
			$('.chkJadwalSelect').change(function (e) { 
				var elm = $(this);
				var strTime = timeTo24HoursSecond(elm.attr('time-start'));
				var endTime = timeTo24HoursSecond(elm.attr('time-end'));
				console.log([strTime,endTime]);
				if (elm.prop('checked')) {
					$('tr.makulrow').each(function (index, element) {
						var ths = $(this);
						var h = false;
						var s = timeTo24HoursSecond(ths.attr('time-start'));
						var e = timeTo24HoursSecond(ths.attr('time-end'));
						var d = ths.attr('row-jadwal-id');

						if (((s>=strTime&&s<=endTime)||(e>=strTime&&e<=endTime) || (strTime>=s&&strTime<=e)||(endTime>=s&&endTime<=e) && ths.attr('jadwal-day')==elm.attr('jadwal-day'))) {
							h=true;
						}

						if (h && d!=elm.attr('checkbox-jadwal-id')) {
							ths.show();
							$('input[checkbox-jadwal-id="'+d+'"').prop('checked', false).trigger('change')
						}
					});
				} else {
                    $('tr.makulrow').each(function (index, element) {
        var ths = $(this);
        var h = true;
        var s = timeTo24HoursSecond(ths.attr('time-start'));
        var e = timeTo24HoursSecond(ths.attr('time-end'));
        var d = ths.attr('row-jadwal-id');

        if (((s >= strTime && s <= endTime) || (e >= strTime && e <= endTime) || (strTime >= s && strTime <= e) || (endTime >= s && endTime <= e) && ths.attr('jadwal-day') == elm.attr('jadwal-day'))) {
            h = false;
        }

        if (h) {
            ths.show();
        }
    });
}
			});
		});
	</script>
</div>
@endsection