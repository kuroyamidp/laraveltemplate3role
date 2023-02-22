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
            <h5 class="card-title">Menu Approve Daftar Wisuda</h5>
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
            <h5 class="card-title">Menu Approve Daftar Sidang</h5>
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
            <h5 class="card-title" class="bi bi-archive">Menu Aprove KRS</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam tenetur, odio dolor nam cum possimus aspernatur ducimus
              rerum architecto iusto nesciunt sequi aut provident. Nostrum sunt illo quidem corporis esse!
            </p>
            <div class="card-header d-flex justify-content-end" style="background-color: white;">
              <a href="{{route('acckrs.index')}}" class="btn btn-dark btn-sm">Rincian</a>
              <!-- {{route('user-admin.index')}} -->
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