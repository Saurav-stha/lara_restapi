<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserBlogController;
// ADMIN API

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// name = route ko lagi name define gareko ho 
Route::get('/blogs/create', [UserBlogController::class,'create'])->name('blogs.create');
Route::get('/blogs/edit/{blog}', [UserBlogController::class,'edit'])->name('blogs.edit');
Route::get('/blogs', [UserBlogController::class,'index'])->name('blogs.index');
Route::get('/blogs/show/{blog}', [UserBlogController::class,'show'])->name('blogs.show');
Route::get('/blogs/destroy', [UserBlogController::class,'destroy'])->name('blogs.destroy');