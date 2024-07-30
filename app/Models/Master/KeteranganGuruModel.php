<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeteranganGuruModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "keterangan_guru";
    protected $fillable = [
        'dosen_id',
        'daftarkelas_id',
        'tanggal',
        'keterangan',
        'image',
    ];
}
