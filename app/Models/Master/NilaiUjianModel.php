<?php


namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NilaiUjianModel extends Model
{
    use HasFactory;

    protected $table = "nilai_ujian";
    protected $fillable = [
        'mahasiswa_id',
        'matkul_id',
        'nilai',
    ];

    public function matkul()
    {
        return $this->belongsTo(MatakuliahModel::class, 'uid');
    }
    protected $appends = ['matkul', 'mahasiswa'];


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