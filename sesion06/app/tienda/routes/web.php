<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', [HomeController::class, 'index']);
Route::resource('/productos', HomeController::class)->only(['destroy']);

