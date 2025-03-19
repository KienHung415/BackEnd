<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\CategoryController;

Route::get('/songs-by-category/{categoryId}', [SongController::class, 'getSongsByCategory']);
Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/categories-with-songs', [CategoryController::class, 'getCategoriesWithSongs']);

// danh mục bài hát
Route::get('/songs/category/{menu_id}', [ProductController::class, 'getSongsByCategory']);
Route::get('/menus', [MenuController::class, 'getAllMenus']);

//hiển thị danh sách bài hát
Route::get('/songs', [ProductApiController::class, 'index']);
Route::get('/products', [ProductApiController::class, 'index']);   

Route::get('/songs', [ProductController::class, 'index']);
Route::get('/search', [SearchController::class, 'search']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//admin khong dươc xoa---
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
//--------//api products
Route::get('/products/search', [ProductController::class, 'search']);
Route::post('/products', [ProductController::class, 'store']);