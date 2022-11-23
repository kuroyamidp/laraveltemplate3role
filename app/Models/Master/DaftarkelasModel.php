<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class DaftarkelasModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "daftar_kelas";
    protected $fillable = [
        'uid',
        'progdi_id',
        'makul_id',
        'dosen_id',
        'ruang_id',
        'start',
        'end',
        'limit_mahasiswa',
        'semester',
        'kode_kelas',
    ];

    protected $appends = ['progdi', 'matkul', 'dosen', 'ruang'];
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
    public function getMatkulAttribute()
    {
        if (array_key_exists('makul_id', $this->attributes)) {
            $kat = DB::table('mata_kuliah')->select('nama')->where('id', $this->attributes['makul_id'])->first();
            if ($kat) {
                return $kat->nama;
            }
        }

        return null;
    }
    public function getDosenAttribute()
    {
        if (array_key_exists('dosen_id', $this->attributes)) {
            $kat = DB::table('dosen')->select('nama')->where('id', $this->attributes['dosen_id'])->first();
            if ($kat) {
                return $kat->nama;
            }
        }

        return null;
    }
    public function getRuangAttribute()
    {
        if (array_key_exists('ruang_id', $this->attributes)) {
            $kat = DB::table('ruang')->select('nama')->where('id', $this->attributes['ruang_id'])->first();
            if ($kat) {
                return $kat->nama;
            }
        }

        return null;
    }
}
