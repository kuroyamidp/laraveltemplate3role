<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatakuliahModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "mata_kuliah";
    protected $fillable = [
        'uid',
        'kode_mk',
        'nama',
    ];
}
