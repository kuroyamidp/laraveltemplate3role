<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class JadwalkelasModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "jadwal_kelas";
    protected $fillable = [
        'uid',
        'kelas_id',
        'hari',
        'semester',
        'periode',
    ];

    protected $appends = ['jam', 'matkul'];
    public function getJamAttribute()
    {
        if (array_key_exists('kelas_id', $this->attributes)) {
            $kat = DB::table('daftar_kelas')->select('start', 'end')->where('id', $this->attributes['kelas_id'])->first();
            if ($kat) {
                return $kat->start . '-' . $kat->end;
            }
        }

        return null;
    }
    public function getMatkulAttribute()
    {
        if (array_key_exists('kelas_id', $this->attributes)) {
            $kat = DaftarkelasModel::where('id',  $this->attributes['kelas_id'])->first();

            if ($kat) {
                return $kat;
            }
        }

        return null;
    }
  
}
