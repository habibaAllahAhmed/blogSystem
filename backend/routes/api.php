<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;


Route::prefix('/posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::delete('/{id}/delete', [PostController::class, 'delete_post'])->whereNumber('id');
    Route::delete('/{id}/force_delete', [PostController::class, 'force_delete_post'])->whereNumber('id');
    Route::get('/{id}/restore', [PostController::class, 'restore_post'])->whereNumber('id');
    Route::post('/add', [PostController::class, 'add_post']);
    Route::post('/{id}/edit', [PostController::class, 'edit_post']);
});
