<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class MahasiswaModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "mahasiswa";
    protected $fillable = [
        'uid',
        'progdi_id',
        'user_id',
        'nis',
        'nim',
        'nama',
        'jenis_kelamin',
        'perguruan_tinggi',
        'semester_id',
        'image',
    ];
    protected $appends = ['progdi','kelas'];
    public function getProgdiAttribute()
    {
        if (array_key_exists('progdi_id', $this->attributes)) {
            $kat = DB::table('progdi')->select('nama_studi')->where('id', $this->attributes['progdi_id'])->first();
            if ($kat) {
                return $kat->nama_studi;
            }
        }

        return null;
    }
    public function getKelasAttribute()
    {
        if (array_key_exists('semester_id', $this->attributes)) {
            $kat = DB::table('kelas')->select('nama')->where('id', $this->attributes['semester_id'])->first();
            if ($kat) {
                return $kat->nama;
            }
        }

        return null;
    }
}
