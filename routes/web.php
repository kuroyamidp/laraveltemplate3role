<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Master\DosenController;
use App\Http\Controllers\Master\MahasiswaController;
use App\Http\Controllers\master\UserDosenController;
use App\Http\Controllers\Master\UserMahasiswaController;
use App\Http\Controllers\Public\ProfilemhsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return redirect('/login');
});


Route::resource('dosen', DosenController::class)->middleware(['auth', 'is_admin']);
Route::resource('mahasiswa', MahasiswaController::class)->middleware(['auth', 'is_admin']);

// routes/web.php

Route::post('/home/updateKeterangan/{id}', [App\Http\Controllers\HomeController::class, 'updateKeterangan'])->name('home.updateKeterangan');
Route::get('/export-pdf', [HomeController::class, 'exportPDF'])->name('export.pdf');



Route::resource('user-mahasiswa', UserMahasiswaController::class)->middleware(['auth', 'is_admin']);
Route::resource('user-dosen', UserDosenController::class)->middleware(['auth', 'is_admin']);
Route::resource('user-admin', AdminController::class)->middleware(['auth', 'is_admin']);

Route::post('/importdosen', [DosenController::class, 'importdatadosen'])->name('importdatadosen')->middleware(['auth', 'is_admin']);
Route::post('/importmahasiswa', [MahasiswaController::class, 'importdatamahasiswa'])->name('importdatamahasiswa')->middleware(['auth', 'is_admin']);


Route::resource('profile', ProfilemhsController::class)->middleware(['auth', 'is_mahasiswa']);
Route::resource('home', HomeController::class)->middleware(['auth', 'is_mahasiswa']);



Route::get('/search-dosen', [DosenController::class, 'searchDosen'])
    ->name('search-dosen')
    ->middleware(['auth', 'is_admin']);
Route::get('/search-mahasiswa', [MahasiswaController::class, 'searchMahasiswa'])
    ->name('search-mahasiswa');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);
Auth::routes();