@extends('layouts.main')

@section('content')
<div class="container">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            .transparent-icon {
                opacity: 0;
            }

            .bg {
                background-color: F1EAFF;
            }

            .custom-file-container__image-preview {
                box-shadow: none;
                max-width: 250px;
                max-height: 400px;
                margin-top: -10px;
                background-color: transparent;

                /* or any other height you want to set */
            }

            @media (max-width: 575.98px) {
                /* your CSS styles for extra small devices here */
            }

            /* styles for screens larger than 576px and smaller than 768px (small devices) */
            @media (min-width: 576px) and (max-width: 767.98px) {
                /* your CSS styles for small devices here */
            }

            /* styles for screens larger than 768px and smaller than 992px (medium devices) */
            @media (min-width: 768px) and (max-width: 991.98px) {
                /* your CSS styles for medium devices here */
            }

            /* styles for screens larger than 992px and smaller than 1200px (large devices) */
            @media (min-width: 992px) and (max-width: 1199.98px) {
                /* your CSS styles for large devices here */
            }

            /* styles for screens larger than 1200px (extra large devices) */
            @media (min-width: 1200px) {
                /* your CSS styles for extra large devices here */
            }
        </style>
        <div class="bg">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-end">
                                    <!-- <h3 class="">Profile</h3> -->
                                    <a href="/profile" class="mt-2 edit-profile ml-1 mr-1 transparent-icon" data-toggle="tooltip" title='Update'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg>
                                    </a>
                                </div>
                                <!-- userinfo mbuat box shadow -->
                                <div class="text-center">
                                    @if(Auth::user()->mahasiswa['image'] != null)
                                    <img src="/Image/{{Auth::user()->mahasiswa['image']}}" alt="{{Auth::user()->mahasiswa['nama']}}" class="custom-file-container__image-preview">
                                    @else
                                    <img src="{{asset('admin/assets/img/90x90.jpg')}}" alt="avatar" class="custom-file-container__image-preview">
                                    @endif
                                </div>
                                <div class="user-info-list d-flex justify-content-center text-center">
                                    <div class="text-center">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">{{Auth::user()->mahasiswa['nama']}}</li>
                                            <li class="badge badge-info">NIM : {{Auth::user()->mahasiswa['nim']}}</li>
                                            @if( Auth::user()->mahasiswa['progdi'] != null)
                                            <li class="contacts-block__item">{{Auth::user()->mahasiswa['progdi']}}</li>
                                            @else
                                            <li class="contacts-block__item">PROGDI BELUM DITENTUKAN</li>
                                            @endif
                                            <li class="contacts-block__item">Kelas : {{Auth::user()->mahasiswa['kelas']}}</li>
                                            <li class="contacts-block__item">{{Auth::user()->email}}</li>
                                            <!-- <li class="contacts-block__item">{{Auth::user()->perguruan_tinggi}}</li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-header d-flex justify-content-center">
                                <b>Jadwal Sekolah hari {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6" class="text-center">{{ \Carbon\Carbon::now()->isoFormat('dddd') }}</th>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td width="1%">No</td>
                                                        <td>Mata kuliah</td>
                                                        <td>Jam</td>
                                                        <td>Jurusan</td>
                                                        <td>Guru</td>
                                                        <td>Ruang</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $nomor = 1; ?>
                                                    @foreach($jdw as $val)
                                                    <tr class="text-center">
                                                        <td class="text-center" width="1%"><?php echo $nomor++; ?></td>
                                                        <td>{{$val->matkul}}</td>
                                                        <td class="text-center">{{$val->start}}</td>
                                                        <td>{{$val->progdi}}</td>
                                                        <td>{{$val->dosen}}</td>
                                                        <td>{{$val->ruang}}</td>
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


                    <!-- <div class="bio layout-spacing ">
                <div class="widget-content widget-content-area">
                    <h3 class="">Bio</h3>
                    <p>I'm Web Developer from California. I code and design websites worldwide. Mauris varius tellus vitae tristique sagittis. Sed aliquet, est nec auctor aliquet, orci ex vestibulum ex, non pharetra lacus erat ac nulla.</p>

                    <p>Sed vulputate, ligula eget mollis auctor, lectus elit feugiat urna, eget euismod turpis lectus sed ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ut velit finibus, scelerisque sapien vitae, pharetra est. Nunc accumsan ligula vehicula scelerisque vulputate.</p>

                    <div class="bio-skill-box">

                        <div class="row">

                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                <div class="d-flex b-skills">
                                    <div>
                                    </div>
                                    <div class="">
                                        <h5>Sass Applications</h5>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                <div class="d-flex b-skills">
                                    <div>
                                    </div>
                                    <div class="">
                                        <h5>Github Countributer</h5>
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 ">

                                <div class="d-flex b-skills">
                                    <div>
                                    </div>
                                    <div class="">
                                        <h5>Photograhpy</h5>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia anim id est laborum.</p>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">

                                <div class="d-flex b-skills">
                                    <div>
                                    </div>
                                    <div class="">
                                        <h5>Mobile Apps</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do et dolore magna aliqua.</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div> -->

                </div>

            </div>


        </div>
</div>
@endsection