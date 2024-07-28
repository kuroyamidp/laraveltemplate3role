<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class AbsensiModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "absensis";
    protected $fillable = [
        'uid',
        'kode_absen',
        'progdi_id',
        'mahasiswa_id',
        'kelas_id',
        'status_absensi',
        'hari',
        'longitude',
        'latitude',
        'image',
    ];

    protected $appends = ['progdi', 'mahasiswa', 'kelas'];
    public function getProgdiAttribute()
    {
        if (array_key_exists('progdi_id', $this->attributes)) {
            $kat = DB::table('progdi')->select('singkatan_studi')->where('id', $this->attributes['progdi_id'])->first();
            if ($kat) {
                return $kat->singkatan_studi;
            }
        }

        return null;
    }
    public function getMahasiswaAttribute()
    {
        if (array_key_exists('mahasiswa_id', $this->attributes)) {
            $kat = DB::table('mahasiswa')->select('nama')->where('id', $this->attributes['mahasiswa_id'])->first();
            if ($kat) {
                return $kat->nama;
            }
        }

        return null;
    }
    public function getKelasAttribute()
    {
        if (array_key_exists('kelas_id', $this->attributes)) {
            $kat = DB::table('kelas')->select('nama')->where('id', $this->attributes['kelas_id'])->first();
            if ($kat) {
                return $kat->nama;
            }
        }

        return null;
    }
    public function dosen()
{
    return $this->belongsTo(DosenModel::class, 'progdi_id', 'progdi_id');
}
}
