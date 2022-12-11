<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index']);

Route::resource('posts', PostController::class);

Route::group(['prefix' => 'personal', 'middleware' => 'auth'], function () {
    Route::get('/', \App\Http\Controllers\Personal\MainController::class)->name('personal.main.index');

    Route::resource('liked', \App\Http\Controllers\Personal\LikedController::class)->names([
        'index' => 'personal.liked.index',
        'store' => 'personal.liked.store',
        'create' => 'personal.liked.create',
        'show' => 'personal.liked.show',
        'update' => 'personal.liked.update',
        'destroy' => 'personal.liked.destroy',
        'edit' => 'personal.liked.edit',
    ]);
    Route::resource('comments', \App\Http\Controllers\Personal\CommentController::class)->names([
        'index' => 'personal.comments.index',
        'store' => 'personal.comments.store',
        'create' => 'personal.comments.create',
        'show' => 'personal.comments.show',
        'update' => 'personal.comments.update',
        'destroy' => 'personal.comments.destroy',
        'edit' => 'personal.comments.edit',
    ]);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', \App\Http\Controllers\Admin\MainController::class)->name('admin.main.index');

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
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->names([
        'index' => 'admin.users.index',
        'store' => 'admin.users.store',
        'create' => 'admin.users.create',
        'show' => 'admin.users.show',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
        'edit' => 'admin.users.edit',
    ]);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
