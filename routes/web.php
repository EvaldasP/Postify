<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
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


Auth::routes();

Route::resource('post', PostController::class);
Route::get('/', [PostController::class, 'index'])->middleware('auth');
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('post.like');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('post.delete');
