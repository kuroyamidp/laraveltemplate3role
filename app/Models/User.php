<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Master\MahasiswaModel;
use App\Models\Master\DosenModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'uid',
        'role_id',
    ];
    protected $appends = ['mahasiswa'];
    public function getMahasiswaAttribute()
    {
        if (array_key_exists('id', $this->attributes)) {
            $kat = MahasiswaModel::where('user_id',  $this->attributes['id'])->first();

            if ($kat) {
                return $kat;
            }
        }

        return null;
    }
    public function getDosenAttribute()
    {
        if (array_key_exists('id', $this->attributes)) {
            $kat = DosenModel::where('user_id',  $this->attributes['id'])->first();

            if ($kat) {
                return $kat;
            }
        }

        return null;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}