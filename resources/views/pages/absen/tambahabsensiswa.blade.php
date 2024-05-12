@extends('layouts.main')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content">
                    <a href="{{ route('absensi.index') }}" class="btn btn-dark btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('absensi.store') }}" method="post" id="absensiForm">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-3">
                                <label for="form-control">Kode Absen</label>
                                <input type="text" class="form-control" name="kode_absen" value="{{ Auth::user()->mahasiswa->nim }}" readonly>
                                @error('kode_absen')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-3" id="jurusanDiv">
                                <label for="form-control">Jurusan</label>
                                <input type="text" class="form-control" name="progdi" value="{{ Auth::user()->mahasiswa->progdi_id }}" readonly>
                                @error('progdi')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-3" id="namaDiv">
                                <label for="form-control">Nama</label>
                                <input type="text" class="form-control" name="mahasiswa" value="{{ Auth::user()->mahasiswa->id }}" readonly>
                                @error('mahasiswa')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-3" id="kelasDiv">
                                <label for="form-control">Kelas</label>
                                <input type="text" class="form-control" name="kelas" value="{{ Auth::user()->mahasiswa->semester_id }}" readonly>
                                @error('kelas')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                    
                            <div class="col-lg-4">
                                <label for="form-control">Tanggal</label>
                                <input type="date" name="hari" class="form-control" value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly>
                                @error('hari')
                                <div class="error" style="color: red; display:block;">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
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
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
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

    // Call the function when the document is ready
    document.addEventListener("DOMContentLoaded", function() {
        hideElementsForStudents();
    });

    // Validate form before submission
    document.getElementById('absensiForm').addEventListener('submit', function(event) {
        // Validate form here if needed
    });
</script>

@endsection
