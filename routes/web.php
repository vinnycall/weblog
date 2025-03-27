<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name("home");
Route::get('/post/{id}', [BlogController::class, 'show'])->name('post.show');
Route::get('/post/{id}/edit', [BlogController::class, 'edit']);
Route::get('/post/{id}/delete', [BlogController::class, 'delete']);
Route::get('/post/create', [BlogController::class, 'create']);
Route::post('/post/store', [BlogController::class, 'store']);   
Route::get('/about', function() {    return view('about');})->name('about');
Route::get('/blog', function() {    return view('blog');})->name('blog');
Route::get('/dashboard', function() {    return view('dashboard');})->name('dashboard');
Route::get('/login', function() {    return view('login');})->name('login');
Route::get('/logout', function() {    return view('logout');})->name('logout');
Route::get('/register', function() {    return view('register');})->name('register');



