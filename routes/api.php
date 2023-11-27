<?php

use App\Http\Controllers\Api\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/all', [IndexController::class, 'index'])->name('index');
Route::get('/latest', [IndexController::class, 'latest'])->name('latest');
Route::get('/show/{post}', [IndexController::class, 'show'])->name('show');
