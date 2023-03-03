<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarWisudaModel extends Model
{
    use HasFactory;

    protected $table = "daftar_wisuda";
    protected $fillable = [
        'nama',
        'npm',
        'tanggal_sidang',
        'jam',
        'file',
        'doc',
    ];
}