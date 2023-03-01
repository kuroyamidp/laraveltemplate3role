<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class KrsModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "krs";
    protected $fillable = [
        'uid',
        'mahasiswa_id',
        'jadwal_id',
        'semester',
        'status',
    ];
}
