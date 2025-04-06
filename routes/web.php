<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;

Route::middleware(['auth'])->group(function () {
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/comment/{post}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::post('/comment/{post}/update', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{post}/delete', [CommentController::class, 'destroy'])->name('comment.delete');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/categories/{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::post('toggle-premium', [UserController::class, 'enablePremium'])->name('toggle-premium');
    Route::post('disable-premium', [UserController::class, 'disablePremium'])->name('disable-premium');
    Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});

Route::get('/', [PostController::class, 'index'])->name("home");
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/upload', [ImageUploadController::class, 'showForm'])->name('image.form');
Route::post('/upload', [ImageUploadController::class, 'upload'])->name('image.upload');
Route::get('/images', [ImageUploadController::class, 'listImages'])->name('images.list');

Route::get('/premium', [AuthController::class, 'premium'])->name('premium');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/about', [HomeController::class, 'about'])->name('about');
