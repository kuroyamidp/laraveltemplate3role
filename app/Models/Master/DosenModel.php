<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class DosenModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "dosen";
    protected $fillable = [
        'uid',
        'progdi_id',
        'kelas_id',
        'user_id',
        'nama',
        'nidn',
        'perguruan_tinggi',
        'jenis_kelamin',
        'jabatan_fungsional',
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
        if (array_key_exists('kelas_id', $this->attributes)) {
            $kat = DB::table('kelas')->select('nama')->where('id', $this->attributes['kelas_id'])->first();
            if ($kat) {
                return $kat->nama;
            }
        }

        return null;
    }
}
