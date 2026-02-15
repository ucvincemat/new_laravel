<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('I am Steve');
});

Route::get('/greet', [GreetController::class, 'greet']);