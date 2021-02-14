<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UserNotificationsController;


Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('explore', [ExploreController::class, 'index']);
    Route::post('search', [SearchController::class, 'index']);
    Route::get('notifications', [UserNotificationsController::class, 'index']);
    Route::get('connections/{user}', [FollowController::class, 'connections']);

    Route::prefix('profile')->group(function (){
        Route::get('/{user}/edit', [ProfileController::class, 'edit'])->middleware('can:edit,user');
        Route::patch('/{user}', [ProfileController::class, 'update']);
        Route::get('/{user}/followings', [FollowController::class, 'followings']);
        Route::get('/{user}/followers', [FollowController::class, 'followers']);
        Route::post('/{user}/follow', [FollowController::class, 'store']);
        Route::get('/{user}/posts', [PostController::class, 'index']);
    });

    Route::prefix('posts')->group(function (){
        Route::post('/', [PostController::class, 'store']);
        Route::post('/{post}/like', [PostLikesController::class, 'store']);
        Route::delete('/{post}/delete', [PostController::class, 'delete']);
    });

    Route::prefix('publications')->group(function (){
        Route::get('/create', [PublicationController::class, 'create']);
        Route::post('/', [PublicationController::class, 'store']);
        Route::get('/{user}', [PublicationController::class, 'index'])->name('publications');
        Route::patch('/{publication}', [PublicationController::class, 'update']);
        Route::get('/{user}/{publication}', [PublicationController::class, 'show']);
        Route::get('/{user}/{publication}/edit', [PublicationController::class, 'edit']);
        Route::delete('/{publication}/delete', [PublicationController::class, 'destroy']);
    });

    Route::get('/download/{publication}', [DownloadController::class, 'download']);
});

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile');

Auth::routes();