<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JadwalujianModel extends Model
{
    use HasFactory;
    protected $table = "jadwalujians";
    protected $fillable = [
        'matkul_id',
        'dosen_id',
        'ruang_id',
        'tanggal',
        'jam',
    ];

    public function matkul()
    {
        return $this->belongsTo(MatakuliahModel::class, 'uid');
    }
    protected $appends = ['matkul', 'dosen', 'ruang'];


    public function getMatkulAttribute()
    {
        if (array_key_exists('matkul_id', $this->attributes)) {
            $kat = DB::table('mata_kuliah')->select('nama')->where('id', $this->attributes['matkul_id'])->first();
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

