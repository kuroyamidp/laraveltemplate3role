@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <ul class="nav nav-tabs" id="border-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="border-home-tab" data-toggle="tab" href="#border-home" role="tab" aria-controls="border-home" aria-selected="true"> Data pribadi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="border-profile-tab" data-toggle="tab" href="#border-profile" role="tab" aria-controls="border-profile" aria-selected="false"> Dokumen identitas</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" id="border-contact-tab" data-toggle="tab" href="#border-contact" role="tab" aria-controls="border-contact" aria-selected="false"> Data orang tua </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="border-contact-tab" data-toggle="tab" href="#border-sekolah" role="tab" aria-controls="border-contact" aria-selected="false"> Asal sekolah </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content mb-4" id="border-tabsContent">
                        <div class="tab-pane fade show active" id="border-home" role="tabpanel" aria-labelledby="border-home-tab">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <label for="fullName">Nama</label>
                                    <input type="text" readonly class="form-control" id="fullName" placeholder="Full Name" value="{{Auth::user()->mahasiswa['nama']}}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form-control">Tempat tinggal</label>
                                    <input type="text" class="form-control" name="tempat_tinggal">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form-control">Tanggal lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4">
                                    <label for="form-control">Warga negara</label>
                                    <select name="warga_negara" class="form-control">
                                        <option value="">Pilih salah satu</option>
                                        <option value="1">WNI</option>
                                        <option value="2">WNA</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="form-control">No. KTP</label>
                                    <input type="text" class="form-control" name="nomor_ktp">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form-control">NISN</label>
                                    <input type="text" class="form-control" name="nisn">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4">
                                    <label for="form-control">Jenis kelamin</label>
                                    <select class="form-control" disabled>
                                        @if(Auth::user()->mahasiswa['jenis_kelamin'] == 1)
                                        <option value="" selected>Laki-laki</option>
                                        @else
                                        <option value="" selected>Perempuan</option>

                                        @endif
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="form-control">Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="">Pilih salah satu</option>
                                        <option value="islam">Islam</option>
                                        <option value="hindu">Hindhu</option>
                                        <option value="budha">Budha</option>
                                        <option value="nasrani">Nasrani</option>
                                        <option value="katolik">Katolik</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="form-control">Gol. darah</label>
                                    <select name="agama" class="form-control">
                                        <option value="">Pilih salah satu</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="0">O</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="border-profile" role="tabpanel" aria-labelledby="border-profile-tab">
                        <div class="media">
                            <img class="meta-usr-img mr-3" src="assets/img/90x90.jpg" alt="Generic placeholder image">
                            <div class="media-body">
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="border-contact" role="tabpanel" aria-labelledby="border-contact-tab">
                        <p class="dropcap  dc-outline-primary">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection