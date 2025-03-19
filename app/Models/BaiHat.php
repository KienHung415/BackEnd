<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BaiHat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'products'; 

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'name',
        'artist',
        'album',
        'menu_id',
        'genre',
        'file_path',
        'duration',
        'active',
        'created_at',
        'updated_at',
        'thumb',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAuthPassword()
    {
        return $this->MatKhau;
    }
}