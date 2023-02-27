@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
  <!-- Navbar -->
  <div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
      <div class="widget widget-content-area br-4 d-flex justify-content-center">
        <div class="widget-one">
          <h6>Selamat datang di menu Aprove Krs admin BAK {{Auth::user()->name}}</h6>
        </div>
      </div>

      <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
          <div class="widget widget-content-area">
            <div class="row mb-1">
              <div class="col-lg-12">
                <table class="table table-bordered table-hover table-striped ">
                  <thead>
                    <tr>
                      <th colspan="6" class="text-center text-uppercase"></th>
                    </tr>
                    <tr>
                      <th>Mahasiswa NISN</th>
                      <th>Nama Mahasiswa</th>
                      <th>Status</th>
                      <th>Nama Matkul</th>
                      <th>Semester</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($krs as $v)
                    <tr>
                      <td>{{$v->nim}}</td>
                      <td>{{($v->nama)}}</td>
                      <td>{{($v->status)}}</td>
                      <td style="text-align: justify;">
                        @foreach($v->daftar_jadwal as $d)
                        <li>{{$d->matkul["matkul"]}}</li>
                        @endforeach
                      </td>
                      <td>{{$v->semester}}</td>
                      <td>
                        <form style="text-align: center;">

                        <a href="{{route('acckrs.create')}}" class="btn btn-success btn-sm" data-toggle="tooltip">Add Status</a>  
                        <a href="{{ route('acckrs.destroy', $v->id) }}" class="btn btn-success btn-sm show_confirm" data-toggle="tooltip">Print</a>
                        </form>


                        <!-- <button type="button" class="btn btn-danger"><i class="bx bx-trash"></i></button> -->

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
      <script>
    const updateButton = document.querySelector('.update-button');
    updateButton.addEventListener('click', function() {
        sessionStorage.setItem('updateButtonClicked', 'true');
    });
</script>
    </div>
    <br>
    @endsection