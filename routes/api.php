<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Api\Post')->prefix('posts')->group(function() {
    // url - /api/posts/...
    Route::get('/', IndexController::class);
    Route::get('/{post}', ShowController::class);
    Route::post('/', StoreController::class);
    Route::patch('/{post}', UpdateController::class);
    Route::delete('{post}', DestroyController::class);
});

Route::namespace('App\Http\Controllers\Api\Category')->prefix('categories')->group(function () {
    // url - /api/categories/...
    Route::get('/', IndexController::class);
    Route::get('/{category}', ShowController::class);
    Route::post('/', StoreController::class);
    Route::patch('/{category}', UpdateController::class);
    Route::delete('/{category}', DestroyController::class);
});

Route::namespace('App\Http\Controllers\Api\Tag')->prefix('tags')->group(function () {
    // url - /api/tags/...
    Route::get('/', IndexController::class);
    Route::get('/{tag}', ShowController::class);
    Route::post('/', StoreController::class);
    Route::patch('/{tag}', UpdateController::class);
    Route::delete('/{tag}', DestroyController::class);
});
