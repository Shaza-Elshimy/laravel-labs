<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/posts');  
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/posts/{post}/restore', [PostController::class, 'restore'])
    ->name('posts.restore')
    ->middleware('auth');

Route::post('/posts/{post}/comments', [PostController::class, 'addComment'])
    ->name('posts.comments.store')
    ->middleware('auth');

Route::resource('posts', PostController::class)->middleware('auth');

Route::delete('/posts/{post}/force-delete', [PostController::class, 'forceDelete'])
    ->name('posts.forceDelete')
    ->middleware('auth');