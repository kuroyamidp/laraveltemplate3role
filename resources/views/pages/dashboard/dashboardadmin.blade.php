@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
  
  <!-- Navbar -->
  <div class="row layout-top-spacing justify-content-center">
    <h2 class="badge badge-success" style="font-size: 1em;">Selamat datang Admin</h4>
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="card text-center" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);">
              <i class="fa fa-database fa-5x mt-3"></i>
              <div class="card-body">
                <h5 class="card-title">Data Pengguna Siswa</h5>
                <p class="card-text">Data siswa yang telah terdaftar di SISKEMA</p>
                <p>Jumlah Siswa Terdaftar: {{ \App\Models\Master\MahasiswaModel::count() }}</p> <!-- Menghitung jumlah siswa -->
                <div class="card-header d-flex justify-content-end" style="background-color: white;">
                  <a href="/mahasiswa" class="btn btn-dark btn-sm">Rincian</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card text-center" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);">
              <i class="fa fa-cogs fa-5x mt-3"></i>
              <div class="card-body">
                <h5 class="card-title">Data Pengguna Guru</h5>
                <p class="card-text">Data GURU yang telah terdaftar di SISKEMA</p>
                <p>Jumlah Guru Terdaftar: {{ \App\Models\Master\DosenModel::count() }}</p> <!-- Menghitung jumlah guru -->
                <div class="card-header d-flex justify-content-end" style="background-color: white;">
                  <a href="/dosen" class="btn btn-dark btn-sm">Rincian</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
