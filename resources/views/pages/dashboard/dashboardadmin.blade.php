@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">
  <!-- Navbar -->
  <div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
      <div class="widget widget-content-area br-4 d-flex justify-content-center">
        <div class="widget-one">
          <h6>Selamat datang admin BAK {{Auth::user()->name}}</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="card text-center">
          <i class="fa fa-database fa-5x mt-3"></i>
          <div class="card-body">
            <h5 class="card-title">Column 1</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam tenetur, odio dolor nam cum possimus aspernatur ducimus
              rerum architecto iusto nesciunt sequi aut provident. Nostrum sunt illo quidem corporis esse!
            </p>
            <div class="card-header d-flex justify-content-end" style="background-color: white;">
              <a href="{{route('user-mahasiswa.index')}}" class="btn btn-dark btn-sm">Rincian</a>
              <!-- {{route('user-admin.index')}} -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card text-center">
          <i class="fa fa-cogs fa-5x mt-3"></i>
          <div class="card-body">
            <h5 class="card-title">Coluumn 3</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam tenetur, odio dolor nam cum possimus aspernatur ducimus
              rerum architecto iusto nesciunt sequi aut provident. Nostrum sunt illo quidem corporis esse!
            </p>
            <div class="card-header d-flex justify-content-end" style="background-color: white;">
              <a href="{{route('user-admin.index')}}" class="btn btn-dark btn-sm">Rincian</a>
              <!-- {{route('user-admin.index')}} -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card text-center">
          <i class="fa fa-code fa-5x mt-3"></i>
          <div class="card-body">
            <h5 class="card-title" class="bi bi-archive">Column 3</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam tenetur, odio dolor nam cum possimus aspernatur ducimus
              rerum architecto iusto nesciunt sequi aut provident. Nostrum sunt illo quidem corporis esse!
            </p>
            <div class="card-header d-flex justify-content-end" style="background-color: white;">
              <a href="{{route('user-admin.index')}}" class="btn btn-dark btn-sm">Rincian</a>
              <!-- {{route('user-admin.index')}} -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-1">
      <div class="col-lg-12">
        <table class="table table-bordered table-hover table-striped ">
          <thead>
            <tr>
              <th colspan="4" class="text-center text-uppercase"></th>
            </tr>
            <tr>
              <th>Nama Mahasiswa</th>
              <th>Jumlah Matkul</th>
              <th style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
           
              <tr>
            <td></td>
            <td></td>
            <td style="text-align: center;">
              <form action="" method="post">
                <button type="button" class="btn btn-danger show_confirm"><i class="bx bx-trash"></i></button>
                <button type="button" onclick="openClassListModal" class="btn btn-info"><i class="bx bx-list-ol"></i></button>
                <a href="" class="btn btn-warning" data-toggle="tooltip" title='Update'><i class="bx bx-edit"></i></a>
              </form>
          </tbody>
     
        </table>

      </div>
    </div>
    <br>
    @endsection