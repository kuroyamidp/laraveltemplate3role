<?php

namespace App\Models\Public;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatapribadimahasiswaModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "data_pribadi_mahasiswa";
    protected $fillable = [
        'uid',
        'user_id',
        'mahasiswa_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'warga_negara',
        'no_ktp',
        'nisn',
        'gol_darah',
        'agama',
        'status_sipil',
        'telp',
        'no_hp',
        'email',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'rt',
        'rw',
    ];
}
