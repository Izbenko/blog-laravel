<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index']);

Route::resource('posts', PostController::class);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'store' => 'admin.categories.store',
        'create' => 'admin.categories.create',
        'show' => 'admin.categories.show',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
        'edit' => 'admin.categories.edit',
    ]);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
