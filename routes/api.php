<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('product', ProductController::class);
Route::apiResource('blog', BlogController::class);

Route::get('/blogs/create', [UserBlogController::class,'create'])->name('blogs.create');
Route::get('/blogs/edit', [UserBlogController::class,'edit'])->name('blogs.edit');
Route::get('/blogs', [UserBlogController::class,'index'])->name('blogs');
Route::get('/blogs/show', [UserBlogController::class,'show'])->name('blogs.show');
Route::get('/blogs/destroy', [UserBlogController::class,'destroy'])->name('blogs.destroy');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
