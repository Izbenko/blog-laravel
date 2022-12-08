<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index']);

Route::resource('posts', PostController::class);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\PostController::class, 'index']);

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class)->names([
        'index' => 'admin.posts.index',
        'store' => 'admin.posts.store',
        'create' => 'admin.posts.create',
        'show' => 'admin.posts.show',
        'update' => 'admin.posts.update',
        'destroy' => 'admin.posts.destroy',
        'edit' => 'admin.posts.edit',
    ]);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'store' => 'admin.categories.store',
        'create' => 'admin.categories.create',
        'show' => 'admin.categories.show',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
        'edit' => 'admin.categories.edit',
    ]);
    Route::resource('tags', \App\Http\Controllers\Admin\TagController::class)->names([
        'index' => 'admin.tags.index',
        'store' => 'admin.tags.store',
        'create' => 'admin.tags.create',
        'show' => 'admin.tags.show',
        'update' => 'admin.tags.update',
        'destroy' => 'admin.tags.destroy',
        'edit' => 'admin.tags.edit',
    ]);
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
