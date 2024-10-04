<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RuangModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "ruang";
    protected $fillable = [
        'uid',
        'kode_ruang',
        'nama',
        'status',
    ];
}
