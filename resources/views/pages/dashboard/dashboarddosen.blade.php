@extends('layouts.main')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

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
            @media (min-width: 1200px) {}
        </style>

        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                    <div class="user-profile layout-spacing">
                        <div class="widget-content widget-content-area">
                            <div class="d-flex justify-content-end">
                            <a href="/profile" class="mt-2 edit-profile ml-1 mr-1 transparent-icon" data-toggle="tooltip" title='Update'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg>
                                    </a>
                            </div>
                            <!-- userinfo mbuat box shadow -->
                            <div class="text-center">
                                @if(Auth::user()->dosen['image'] != null)
                                <img src="/Image/{{Auth::user()->dosen['image']}}" alt="{{Auth::user()->dosen['nama']}}" class="custom-file-container__image-preview">
                                @else
                                <img src="{{asset('admin/assets/img/90x90.jpg')}}" alt="avatar" class="custom-file-container__image-preview">
                                @endif


                                <div class="user-info-list d-flex justify-content-center text-center">
                                    <div class="text-center">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">{{Auth::user()->dosen['nama']}}</li>
                                            <li class="badge badge-info">NUPTK : {{Auth::user()->dosen['nidn']}}</li>
                                            @if( Auth::user()->dosen['progdi'] != null)
                                            <li class="contacts-block__item">Wali Kelas :</li>
                                            <li class="contacts-block__item">{{Auth::user()->dosen['progdi']}}-{{Auth::user()->dosen['kelas']}} </li>
                                            @else
                                            <li class="contacts-block__item">PROGDI BELUM DITENTUKAN</li>
                                            @endif
                                            <li class="contacts-block__item">jabatan : {{Auth::user()->dosen['jabatan_fungsional']}}</li>
                                            <li class="contacts-block__item">{{Auth::user()->email}}</li>
                                            <li class="contacts-block__item">{{Auth::user()->perguruan_tinggi}}</li>
                                        </ul>
                                    </div>
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
                                                    <th colspan="7" class="text-center">{{ \Carbon\Carbon::now()->isoFormat('dddd') }}</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <td width="1%">No</td>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Jam</th>
                                                    <th>Jurusan</th>
                                                    <th>Guru</th>
                                                    <th>Ruang</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($dos as $val)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $val->matkul }}</td>
                                                    <td class="text-center">{{ $val->start }}</td>
                                                    <td class="text-center">{{ $val->progdi }}</td>
                                                    <td class="text-center">{{ $val->dosen }}</td>
                                                    <td class="text-center">{{ $val->ruang }}</td>
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{ $val->id }}">
                                                            <i class="fa fa-book"></i>
                                                        </button>
                                                        <a href="{{ route('export.pdf') }}" class="btn btn-primary">Export</a>


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="updateModal{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $val->id }}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="updateModalLabel{{ $val->id }}">Tambah Keterangan</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{ route('home.updateKeterangan', $val->id) }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="keterangan">Keterangan</label>
                                                                                <input type="text" class="form-control" id="keterangan{{ $val->id }}" name="keterangan">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="image-upload{{ $val->id }}" class="btn btn-primary">Browse</label>
                                                                                <input type="file" class="form-control-file" id="image-upload{{ $val->id }}" name="image" style="display: none;">
                                                                                <small id="file-name{{ $val->id }}" class="form-text text-muted">No file chosen</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.querySelectorAll('input[type="file"]').forEach(function(input) {
                                input.addEventListener('change', function(event) {
                                    const fileInput = event.target;
                                    const fileId = fileInput.id;
                                    const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'No file chosen';
                                    document.getElementById('file-name' + fileId.replace('image-upload', '')).textContent = fileName;
                                });
                            });
                        </script>



                        @endsection