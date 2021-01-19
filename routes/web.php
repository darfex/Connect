<?php

use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\SearchController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\PublicationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/posts/{post}/like', [PostLikesController::class, 'store']);
    Route::delete('/posts/{post}/delete', [PostController::class, 'delete']);
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->middleware('can:edit,user');
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->middleware('can:edit,user');
    Route::get('/profile/{user}/followings', [FollowController::class, 'followings']);
    Route::get('/profile/{user}/followers', [FollowController::class, 'followers']);
    Route::post('/profile/{user}/follow', [FollowController::class, 'store']);
    Route::get('/profile/{user}/posts', [ProfileController::class, 'posts']);
    Route::get('/explore', [ExploreController::class, 'index']);
    Route::post('/publications', [PublicationController::class, 'store']);
    Route::patch('/publications/{publication}', [PublicationController::class, 'update']);
    Route::get('/publications/{user}/{publication}', [PublicationController::class, 'show']);
    Route::get('/publications/create', [PublicationController::class, 'create']);
    Route::get('/publications/{user}/{publication}/edit', [PublicationController::class, 'edit']);
    Route::get('/publications/{user}', [PublicationController::class, 'index'])->name('publications');
    Route::post('/search', [SearchController::class, 'index']);
    Route::get('/download/{publication}', [DownloadController::class, 'download']);
    Route::get('/notifications', [DownloadController::class, 'show']);
    Route::get('/area/{user}/{area}', [AreaController::class, 'update']);
});

Route::get('/dropdown', function() {
    die('hey');
    $input = $request->input('option');
    ddd($input);
})->name('dropdown');

Route::get('/signup', function(){
    return view('auth.register', [
        'departments' => Department::orderBy('name')->get()
    ]);
});

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile');

Auth::routes();