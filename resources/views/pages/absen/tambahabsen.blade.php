@extends('layouts.main')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content">
                    <a href="{{route('absensi.index')}}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">

                <form action="{{ route('absensi.store') }}" method="post" enctype="multipart/form-data">
                        <div class="row mb-1">
                            <div class="col-lg-3">
                                <label for="form-control">Kode Absen</label>
                                <input type="text" class="form-control" name="kode_absen">
                                @if($errors->has('kode_absen'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('kode_absen') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Jurusan</label>
                                <select class="form-control" data-live-search="true" name="progdi">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($progdi as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama_studi}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('progdi'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('progdi') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">Siswa</label>
                                <select class="form-control" data-live-search="true" name="mahasiswa">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($mahasiswa as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('mahasiswa'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('mahasiswa') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <label for="form-control">kelas</label>
                                <select class="form-control" data-live-search="true" name="kelas">
                                    <option value="">Pilih salah satu</option>
                                    @foreach($kelas as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                           
                        <div class="row mb-1">
                        <div class="col-lg-4">
                                <label for="form-control">Absen</label>
                                <select name="status" class="form-control">
                                    <option value="">Pilih salah satu</option>
                                    <option value="0">Tidak Masuk</option>
                                    <option value="1">Masuk</option>
                                    <option value="2">Ijin</option>
                                    <option value="3">Sakit</option>
                                </select>
                                @error('status')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        <div class="col-lg-4" id="latitudeDiv">
                                <label for="form-control">Latitude</label>
                                <input type="text" class="form-control" name="latitude" id="latitude" readonly>
                                @error('latitude')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Field untuk longitude -->
                            <div class="col-lg-4" id="longitudeDiv">
                                <label for="form-control">Longitude</label>
                                <input type="text" class="form-control" name="longitude" id="longitude" readonly>
                                @error('longitude')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Foto <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="foto" accept="image/*">
                                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="10485760" /> -->
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        <span class="custom-file-container__custom-file__custom-file-control custom-file-container__custom-file__custom-file-control--browse">Browse</span>
                                    </label>
                                    <div class="custom-file-container__image-preview" id="imagePreview">
                                        <p>Nama File: <span id="fileName">Tidak ada file yang dipilih</span></p>
                                    </div>
                                </div>
                                @if($errors->has('foto'))
                                <div class="error" style="color: red; display:block;">
                                    {{ $errors->first('foto') }}
                                </div>
                                @endif
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            </div>
                        </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    // Function to hide elements for students
    function hideElementsForStudents() {
        document.getElementById('jurusanDiv').style.display = 'none';
        document.getElementById('namaDiv').style.display = 'none';
        document.getElementById('kelasDiv').style.display = 'none';
    }

    // Function to get user's location
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }

    // Call the function when the document is ready
    document.addEventListener("DOMContentLoaded", function() {
        hideElementsForStudents();
        getLocation();
    });

    // Validate form before submission
    document.getElementById('absensiForm').addEventListener('submit', function(event) {
        // Optionally add form validation here
    });
</script>

@endsection