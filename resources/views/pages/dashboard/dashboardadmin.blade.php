@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
  
  <!-- Navbar -->
  <div class="row layout-top-spacing justify-content-center">
    <h2 class="badge badge-success" style="font-size: 1em;">Selamat datang Admin</h4>
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="card text-center" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);">
              <i class="fa fa-database fa-5x mt-3"></i>
              <div class="card-body">
                <h5 class="card-title">Data Mahasiswa</h5>
                <p class="card-text">Data Mahasiswa yang telah terdaftar di STIMIK AKI PATI
                </p>
                <div class="card-header d-flex justify-content-end" style="background-color: white;">
                  <a href="/mahasiswa" class="btn btn-dark btn-sm">Rincian</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
          <div class="card text-center" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);">
              <i class="fa fa-cogs fa-5x mt-3"></i>
              <div class="card-body">
                <h5 class="card-title">Data Dosen</h5>
                <p class="card-text">Data Dosen yang telah terdaftar di STIMIK AKI PATI
                </p>
                <div class="card-header d-flex justify-content-end" style="background-color: white;">
                  <a href="/dosen" class="btn btn-dark btn-sm">Rincian</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card text-center" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);">
              <i class="fa fa-code fa-5x mt-3"></i>
              <div class="card-body">

                <h5 class="card-title" class="bi bi-archive">Menu Aprove KRS</h5>
                <p class="card-text">Data Krs yang sebelumnya telah diisi oleh Mahasiswa
                </p>
                <div class="card-header d-flex justify-content-end" style="background-color: white;">
                  <a href="{{route('acckrs.index')}}" class="btn btn-dark btn-sm">Rincian</a>
                </div>
              </div>
            </div>
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
@endsection 

