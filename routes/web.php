<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/post/{id}', [BlogController::class, 'show'])->name('post.show');
Route::get('/post/{id}/edit', [BlogController::class, 'edit']);
Route::get('/post/{id}/delete', [BlogController::class, 'delete']);
Route::get('/post/create', [BlogController::class, 'create']);
Route::post('/post/store', [BlogController::class, 'store']);   



