<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUjianModel extends Model
{
    protected $table = "nilai_ujian";
    protected $fillable = [
        'mahasiswa_id',
        'matkul_id',
        'nilai',
    ];
}