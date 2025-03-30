<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', [BlogController::class, 'index'])->name("home");
Route::get('/post/{id}', [BlogController::class, 'show'])->name('post.show');
Route::get('/post/{id}/edit', [BlogController::class, 'edit']);
Route::get('/post/{id}/delete', [BlogController::class, 'delete']);
Route::get('/post/create', [BlogController::class, 'create']);
Route::post('/post/store', [BlogController::class, 'store'])->name('post.store');   
Route::get('/about', function() {    return view('about');})->name('about');
Route::get('/create', function() {    return view('create');})->name('create');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/myposts', [BlogController::class, 'myPosts'])->name('myposts')->middleware('auth');

Route::get('/dashboard', function() {
    $user = Auth::user();
    $username = request()->query('username');
    return view('dashboard', compact('user','username'));
})->name('dashboard')->middleware('auth');

