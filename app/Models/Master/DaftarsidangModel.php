<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DaftarsidangModel extends Model
{
    use HasFactory;
    protected $table = "daftarsidangs";
    protected $fillable = [
        'nama',
        'npm',
        'tanggal_sidang',
        'jam',
        'file',
    ];
}