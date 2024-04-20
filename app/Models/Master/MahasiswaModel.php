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
        'nim',
        'nama',
        'jenis_kelamin',
        'perguruan_tinggi',
        'status_mahasiswa',
        'status',
        'image',
    ];
    protected $appends = ['progdi'];
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
}
