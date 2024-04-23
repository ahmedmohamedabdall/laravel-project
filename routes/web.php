<?php

use App\Http\Controllers\Admin\DashBoardController as AdminDashBoardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikecontroller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale',$lang) ;


    return redirect()->route('dashboard');
})->name('lang');

Route::get('/', [Dashboardcontroller::class, 'index'])->name('dashboard');
Route::resource('ideas', IdeaController::class)
    ->except('index', 'create')
    ->middleware('auth');

Route::resource('ideas.comments', CommentController::class)
    ->only('store')
    ->middleware('auth');

Route::resource('user', UserController::class)->only('show');

Route::resource('user', UserController::class)
    ->only('edit', 'update')
    ->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])
    ->middleware('auth')
    ->name('profile');

Route::post('user/{user}/follow', [FollowerController::class, 'follow'])
    ->middleware('auth')
    ->name('user.follow');

Route::post('user/{user}/unfollow', [FollowerController::class, 'unfollow'])
    ->middleware('auth')
    ->name('user.unfollow');

Route::post('idea/{idea}/like', [IdeaLikecontroller::class, 'like'])
    ->middleware('auth')
    ->name('user.like');

Route::post('idea/{idea}/unlike', [IdeaLikecontroller::class, 'unlike'])
    ->middleware('auth')
    ->name('user.unlike');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/feed', FeedController::class)
    ->name('feed')
    ->middleware('auth');

Route::get('/admin', [AdminDashBoardController::class, 'index'])
    ->name('Admin.dashboard')
    ->middleware(['auth', 'can:admin']);
