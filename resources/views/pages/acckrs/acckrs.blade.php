@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
  <!-- Navbar -->
  <div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
      <div class="widget widget-content-area">
        <div class="row mb-1">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-hover" id="default-ordering">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Mahasiswa NISN</th>
                    <th>Nama Mahasiswa</th>
                    <th>Status</th>
                    <th>Nama Matkul</th>
                    <th>Semester</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($krs as $key => $v)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$v->nim}}</td>
                    <td>{{($v->nama)}}</td>
                    <td>
                      @if($v->status == 0)
                      <span class="badge badge-info">Menunggu konfirmasi</span>
                      @elseif($v->status == 1)
                      <span class="badge badge-info">KRS di terima</span>
                      @else
                      <span class="badge badge-danger">KRS di tolak</span>
                      @endif
                    </td>
                    <td style="text-align: justify;">
                      @foreach($v->daftar_jadwal as $d)
                      <li>{{$d->matkul["matkul"]}}</li>
                      @endforeach
                    </td>
                    <td>{{$v->semester}}</td>
                    <td>
                      <form method="POST" action="{{ route('status') }}">
                        @csrf
                        <input type="hidden" name="id" value="123">
                        <button class="btn btn-success btn-sm" data-toggle="tooltip" type="submit">Kirim</button>
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
</div>
@endsection
<script>
  const updateButton = document.querySelector('.update-button');
  updateButton.addEventListener('click', function() {
    sessionStorage.setItem('updateButtonClicked', 'true');
  });
</script>