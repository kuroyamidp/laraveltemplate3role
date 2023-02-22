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
      <div class="widget widget-content-area 
  <div class="row mb-1">
      <div class="col-lg-12">
        <table class="table table-bordered table-hover table-striped ">
          <thead>
            <tr>
              <th colspan="4" class="text-center text-uppercase"></th>
            </tr>
            <tr>
              <th>Id Mahasiswa</th>
              <th>Jumlah Matkul</th>
              <th style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($krs as $key => $value)
            <tr>

              <td>{{$value->mahasiswa_id}}</td>
              <td>{{$value->jadwal_id}}</td>
              <td style="text-align: center;">

                  <a href="" class="btn btn-primary" data-toggle="tooltip" title='Update'><i class="bx bx-envelope"></i></a>
                </form>


                <!-- <button type="button" class="btn btn-danger"><i class="bx bx-trash"></i></button> -->

            </tr>
            @endforeach
          </tbody>

        </table>

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