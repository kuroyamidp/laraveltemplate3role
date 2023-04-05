<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DaftarWisudaModel extends Model
{
    use HasFactory;

    protected $table = "daftar_wisuda";
    protected $fillable = [
        'mahasiswa_id',
        'npm',
        'tanggal_sidang',
        'jam',
        'file',
        'doc',
    ];
    protected $appends = ['mahasiswa'];

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
}