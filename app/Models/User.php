<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NguoiDung extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'NguoiDung';
    protected $primaryKey = 'MaNguoiDung';

    protected $fillable = [
        'name',
        'email',
        'password',
        'TenDangNhap',
        'MatKhau',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'MatKhau',
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