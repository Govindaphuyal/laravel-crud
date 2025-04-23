<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts',PostController::class)->middleware('auth');
// Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
