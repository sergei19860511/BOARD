<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('post.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/create', [HomeController::class, 'create'])->name('home.create');
Route::post('/home', [HomeController::class, 'store'])->name('home.store');

Route::get('/home/{post}/edit', [HomeController::class, 'edit'])->name('home.edit')
    ->middleware('can:update,post');
Route::patch('/home/{post}', [HomeController::class, 'update'])->name('home.update')
    ->middleware('can:update,post');
Route::delete('/home/{post}', [HomeController::class, 'destroy'])->name('home.destroy')
    ->middleware('can:destroy,post');



Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
