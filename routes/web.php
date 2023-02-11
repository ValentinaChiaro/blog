<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminPostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Posts

Route::get('/',[PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}',[PostController::class, 'show']);

// Admin
Route::middleware('can:admin')->group(function () {

    Route::get('admin/posts/create', [AdminPostController::class, 'create']);

    Route::post('admin/posts', [AdminPostController::class, 'store']);

    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);

    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);

    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);

    Route::get('admin/posts/{status}', [AdminPostController::class, 'index']);

});

// Comments

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

// Newsletter

Route::post('newsletter', NewsletterController::class);

// Register

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// Sessions

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


