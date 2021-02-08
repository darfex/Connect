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

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/explore', [ExploreController::class, 'index']);
    Route::post('/search', [SearchController::class, 'index']);
    Route::get('/notifications', [UserNotificationsController::class, 'index']);
    Route::get('/connections/{user}', [FollowController::class, 'connections']);

    Route::prefix('posts')->group(function (){
        Route::post('/posts', [PostController::class, 'store']);
        Route::post('/posts/{post}/like', [PostLikesController::class, 'store']);
        Route::delete('/posts/{post}/delete', [PostController::class, 'delete']);
    });

    Route::prefix('publications')->group(function (){
        Route::get('create', [PublicationController::class, 'create']);
        Route::post('', [PublicationController::class, 'store']);
        Route::get('{user}', [PublicationController::class, 'index'])->name('publications');
        Route::patch('/{publication}', [PublicationController::class, 'update']);
        Route::get('/{user}/{publication}', [PublicationController::class, 'show']);
        Route::get('/{user}/{publication}/edit', [PublicationController::class, 'edit']);
        Route::delete('/{publication}/delete', [PublicationController::class, 'destroy']);
    });

    Route::prefix('profile/{user}')->group(function (){
        Route::get('/edit', [ProfileController::class, 'edit'])->middleware('can:edit,user');
        Route::patch('', [ProfileController::class, 'update'])->middleware('can:edit,user');
        Route::get('/followings', [FollowController::class, 'followings']);
        Route::get('/followers', [FollowController::class, 'followers']);
        Route::post('/follow', [FollowController::class, 'store']);
        Route::get('/posts', [PostController::class, 'index']);
    });

    Route::get('/download/{publication}', [DownloadController::class, 'download']);
});

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile');

Auth::routes();