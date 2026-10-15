<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('/post')->name('post.')->group(function () {
    Route::get('/add', [PostController::class, 'add_index'])->name('add');
    Route::post('/add', [PostController::class, 'add_post'])->name('add.submit');
    Route::get('/{id}/delete', [PostController::class, 'delete_post'])->name('delete')->whereNumber('id');
    Route::get('/{id}/restore', [PostController::class, 'restore_post'])->name('restore')->whereNumber('id');
    Route::get('/{id}/force_delete', [PostController::class, 'force_delete_post'])->name('force_delete')->whereNumber('id');
    Route::get('/{id}/edit', [PostController::class, 'edit_index'])->name('edit');
    Route::post('/{id}/edit', [PostController::class, 'edit_post'])->name('edit.submit');
});
