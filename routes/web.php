<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TestController;
use PHPUnit\Event\Code\Test;

// Route::resource('post', PostController::class);
Route::middleware(['auth'])->group(function () {
    // ...
});

// TODO :: middleware group toepassen
Route::get('/', [PostController::class, 'index'])->name("home");
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->middleware('auth')->name('post.edit');
Route::post('/post/{post}/update', [PostController::class, 'update'])->middleware('auth')->name('post.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->middleware('auth')->name('post.destroy');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');   


Route::post('/post/{post}/comment', [CommentController::class,'store'])->middleware('auth')->name('comment.store');
Route::post('/comment/{post}/edit', [CommentController::class, 'edit'])->middleware('auth')->name('comment.edit');
Route::post('/comment/{post}/update', [CommentController::class, 'update'])->middleware('auth')->name('comment.update');
Route::delete('/comment/{post}/delete', [CommentController::class, 'destroy'])->middleware('auth')->name('comment.delete');

Route::get('/categories', [PostController::class, 'categories'])->name('categories');

// TODO :: Controller functie voor maken
Route::get('/about', function() {    return view('about');})->name('about');
// Route::get('/create', function() {    return view('create');})->name('create');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts')->middleware('auth');

// TODO :: Controller functie voor maken
Route::get('/dashboard', function() {
    $user = Auth::user();
    $username = request()->query('username');
    return view('dashboard', compact('user','username'));
})->name('dashboard')->middleware('auth');

