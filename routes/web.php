<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\http\Middleware\Authenticate;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Artisan;

Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){

        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('main',[MainController::class,'index']);

        #Menu
    Route::prefix('menus')->group(function (){

        Route::get('add',[MenuController::class,'create']);
        Route::post('add',[MenuController::class,'store']);
        Route::get('list',[MenuController::class,'index']);
        Route::get('edit/{menu}',[MenuController::class,'show']);
        Route::post('edit/{menu}',[MenuController::class,'update']);
        Route::DELETE('destroy',[MenuController::class,'destroy']);
        });
        #Product
    Route::prefix('products')->group(function(){ //B1: tạo route và controller và bàng csdl(model)
        Route::get('add',[ProductController::class,'create']);
        Route::post('add',[ProductController::class,'store']);
        Route::get('list',[ProductController::class,'index']);
        Route::get('edit/{product}',[ProductController::class,'show']);
        Route::post('edit/{product}',[ProductController::class,'update']);
        Route::DELETE('destroy',[ProductController::class,'destroy']);
    });

        #Uploadfile ảnh
        Route::post('upload/services',[App\Http\Controllers\Admin\UploadController::class,'store']);
        
        #Uploadfile nhạc
        Route::post('upload/audios',[App\Http\Controllers\Admin\UploadMusicController::class,'store']);
    });

});

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\SongController;
Route::get('/api/search', [SongController::class, 'search']);


//symbolic link
Route::get('/create-symlinks', function () {
    // Tạo symbolic link cho thư mục audio
    $targetFolderAudio = storage_path('app/public/audio');
    $linkFolderAudio = public_path('storage/audio');
    if (!file_exists($linkFolderAudio)) {
        symlink($targetFolderAudio, $linkFolderAudio);
    }

    // Tạo symbolic link cho thư mục uploads
    $targetFolderUploads = storage_path('app/public/uploads');
    $linkFolderUploads = public_path('storage/uploads');
    if (!file_exists($linkFolderUploads)) {
        symlink($targetFolderUploads, $linkFolderUploads);
    }

    return 'Audio and Uploads symlinks created';
});