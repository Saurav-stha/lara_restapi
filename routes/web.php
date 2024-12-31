<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UploadController;
// use App\Http\Middleware\AdminMiddleware;
use App\Models\User; 
use Laravel\Socialite\Facades\Socialite;

// ADMIN API

Route::get('/', function () {
    return view('welcome');
});

Route::controller(SocialiteController::class)->group(function(){
    Route::get("/auth/google", 'googleLogin')->name('auth.google');
    Route::get("/auth/google/callback", 'googleAuthentication')->name('auth.google-callback');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// name = route ko lagi name define gareko ho 
Route::prefix('blogs')
    ->middleware(['auth','is_admin:1'])//0=admin, 1=user
    ->controller(UserBlogController::class)
    ->group(function(){
        Route::get('/create', 'create')->name('blogs.create');
        Route::get('/edit/{blog}', 'edit')->name('blogs.edit');
        Route::get('/', 'index')->name('blogs.index');
        Route::get('/show/{blog}', 'show')->name('blogs.show');
});

Route::prefix('genre')
    ->controller(GenreController::class)
    ->group(function(){
        Route::get('/create', 'create')->name('genre.create');
        Route::get('/edit/{genre}', 'edit')->name('genre.edit');
        Route::get('/', 'index')->name('genre.index');
        Route::post('/','store')->name('genre.store');
        Route::put('/{genre}','update')->name('genre.update');
        Route::delete('/{genre}','destroy')->name('genre.destroy');
});

Route::get('send-mail', [MailController::class, 'index']);

Route::prefix('bulk-upload')
    ->middleware(['auth','is_admin:1'])//0=admin, 1=user
    ->controller(UploadController::class)
    ->group(function(){
        Route::get('/', 'index')->name('upload.index');
});

Route::prefix('bulk-upload')
    ->middleware(['upload'])//0=admin, 1=user
    ->controller(UploadController::class)
    ->group(function(){
        Route::post('/','store')->name('upload.store');
});



