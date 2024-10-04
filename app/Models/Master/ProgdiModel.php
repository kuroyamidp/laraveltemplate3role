<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgdiModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "progdi";
    protected $fillable = [
        'uid',
        'kode_progdi',
        'nama_studi',
        'singkatan_studi',
    ];
}
