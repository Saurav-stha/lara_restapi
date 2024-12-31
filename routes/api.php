<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('product', ProductController::class);
Route::apiResource('blog', BlogController::class); //route is api/blog, created for crud

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
