<?php

use Illuminate\Support\Facades\Route;

// ADMIN API

Route::get('/', function () {
    return view('welcome');
});
