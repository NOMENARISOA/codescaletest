<?php

use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getScore', [App\Http\Controllers\ScoreController::class, 'GetScore'])->name('getscore');
