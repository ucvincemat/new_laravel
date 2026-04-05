<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);

Route::get('/hello', function () {
    return view('greet');
});

Route::get('/greet', [GreetController::class, 'greet']);

Route::resource('tasks', TaskController::class);