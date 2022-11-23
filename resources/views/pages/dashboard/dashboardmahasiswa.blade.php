@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-end">
                        <!-- <h3 class="">Profile</h3> -->
                        <a href="user_account_setting.html" class="mt-2 edit-profile ml-1 mr-1"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg></a>
                    </div>
                    <div class="text-center user-info">
                        @if(Auth::user()->mahasiswa['image'] != null)
                        <img src="/Image/{{Auth::user()->mahasiswa['image']}}" alt="{{Auth::user()->mahasiswa['nama']}}">
                        @else
                        <img src="{{asset('admin/assets/img/90x90.jpg')}}" alt="avatar">
                        @endif
                        <p class="">{{Auth::user()->mahasiswa['nama']}}</p>
                        <small class="badge badge-info">{{Auth::user()->mahasiswa['nim']}}</small>
                    </div>
                    <div class="user-info-list d-flex justify-content-center">

                        <div class="">
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">Semester saat ini {{Auth::user()->mahasiswa['semester_awal']}}</li>
                                <li class="contacts-block__item">{{Auth::user()->mahasiswa['perguruan_tinggi']}}</li>
                                @if(Auth::user()->mahasiswa['status'] == 0)
                                <li class="contacts-block__item"><span class="badge badge-danger">Mahasiswa non aktif</span></li>
                                @elseif(Auth::user()->mahasiswa['status'] == 1)
                                <li class="contacts-block__item"><span class="badge badge-primary">Mahasiswa aktif</span></li>
                                @else
                                <li class="contacts-block__item"><span class="badge badge-success">Mahasiswa lulus</span></li>
                                @endif
                                <li class="contacts-block__item">{{Auth::user()->email}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
            <div class="card" style="border-radius: 10px;">
                <div class="card-header d-flex justify-content-center">
                    <b>Jadwal perkulihan hari {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="5" class="text-center">{{ \Carbon\Carbon::now()->isoFormat('dddd') }}</th>
                                        </tr>
                                        <tr>
                                            <td width="1%">No</td>
                                            <td>Mata kuliah</td>
                                            <td>Jam</td>
                                            <td>Dosen</td>
                                            <td>Ruang</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
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
@endsection