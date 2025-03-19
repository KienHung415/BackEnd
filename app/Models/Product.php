<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable=[

        'name',//tên bài hát
        'artist',//tên nghệ sĩ
        'menu_id',//
        'file_path',//file nhạc
        'active',//hoạt động
        'thumb'//ảnh
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class,'id','menu_id');
    }
} 