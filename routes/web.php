<?php

use App\Http\Controllers\AccKrsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DaftarsidangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Master\DaftarkelasController;
use App\Http\Controllers\Master\DosenController;
use App\Http\Controllers\Master\JadwalkelasController;
use App\Http\Controllers\Master\LihatJadwalController;
use App\Http\Controllers\Master\MahasiswaController;
use App\Http\Controllers\Master\MatakuliahController;
use App\Http\Controllers\Master\ProgdiController;
use App\Http\Controllers\Master\RuangkelasController;
use App\Http\Controllers\Master\SemesterIniController;
use App\Http\Controllers\Master\UserMahasiswaController;
use App\Http\Controllers\Public\KrsController;
use App\Http\Controllers\Public\ProfilemhsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});

Route::resource('matakuliah', MatakuliahController::class)->middleware(['auth', 'is_admin']);

Route::resource('ruangkelas', RuangkelasController::class)->middleware(['auth', 'is_admin']);
Route::resource('progdi', ProgdiController::class)->middleware(['auth', 'is_admin']);
Route::resource('dosen', DosenController::class)->middleware(['auth', 'is_admin']);
Route::resource('mahasiswa', MahasiswaController::class)->middleware(['auth', 'is_admin']);
Route::resource('daftar-kelas', DaftarkelasController::class)->middleware(['auth', 'is_admin']);
Route::resource('jadwal-kelas', JadwalkelasController::class)->middleware(['auth', 'is_admin']);
Route::resource('user-mahasiswa', UserMahasiswaController::class)->middleware(['auth', 'is_admin']);
Route::resource('user-admin', AdminController::class)->middleware(['auth', 'is_admin']);
Route::resource('acckrs', AccKrsController ::class)->middleware(['auth', 'is_admin']);
Route::post('/importdosen', [DosenController::class, 'importdatadosen'])->name('importdatadosen')->middleware(['auth', 'is_admin']);
Route::post('/importmahasiswa', [MahasiswaController::class, 'importdatamahasiswa'])->name('importdatamahasiswa')->middleware(['auth', 'is_admin']);
Route::post('/importdatamatkul', [MatakuliahController::class, 'importdatamatkul'])->name('importdatamatkul')->middleware(['auth', 'is_admin']);
Route::post('/importkelas', [RuangkelasController::class, 'importkelas'])->name('importkelas')->middleware(['auth', 'is_admin']);
Route::get('/getkelas', [DaftarkelasController::class, 'getkelas'])->name('getkelas')->middleware(['auth', 'is_admin']);

Route::resource('krs', KrsController::class)->middleware(['auth', 'is_mahasiswa']);
Route::resource('profile', ProfilemhsController::class)->middleware(['auth', 'is_mahasiswa']);
Route::resource('home', HomeController::class)->middleware(['auth', 'is_mahasiswa']);
Route::resource('lihatjadwal', LihatJadwalController::class)->middleware(['auth', 'is_mahasiswa']);
Route::resource('semesterini', SemesterIniController::class)->middleware(['auth', 'is_mahasiswa']);
Route::resource('daftarsidang', DaftarsidangController::class)->middleware(['auth', 'is_mahasiswa']);
//cetak krs
Route::get('/cetakkrs', [KrsController::class, 'cetakkrs'])->name('cetakkrs')->middleware(['auth','is_mahasiswa']);
Route::get('/cetakdaftarsidang', [DaftarsidangController::class, 'cetakdaftarsidang'])->name('cetakkrs')->middleware(['auth','is_mahasiswa']);
Route::get('/cetaklihatjadwal', [LihatJadwalController::class, 'cetaklihatjadwal'])->name('cetakkrs')->middleware(['auth','is_mahasiswa']);
Route::get('/cetakjadwalsemester', [SemesterIniController::class, 'cetakjadwalsemester'])->name('cetakkrs')->middleware(['auth','is_mahasiswa']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);
Auth::routes();
