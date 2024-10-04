<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class KelasModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "kelas";
    protected $fillable = [
        'uid',
        'kode_kelas',
        'nama',
    ];
}
