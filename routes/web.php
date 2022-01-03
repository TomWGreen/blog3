<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'welcome']);

Route::get('/posts/create', [PostController::class, 'createForm'])->middleware(['auth'])->name('post.form');

Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::post('/posts/create', [PostController::class, 'save'])->middleware(['auth'])->name('post.save');

Route::post('/dshboard', [PostController::class, 'saveRating'])->middleware(['auth'])->name('rating.save');

Route::get('/posts/{id}/edit', [PostController::class, 'editForm'])->middleware(['auth'])->name('post.edit.form');

Route::post('/posts/delete', [PostController::class, 'delete'])->middleware(['auth'])->name('post.delete');

require __DIR__.'/auth.php';
