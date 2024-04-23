<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'guest'],function (){
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('regiter.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'LoginAuth'])->name('login.chek');

});



Route::post('/logout', [AuthController::class, 'Logout'])->middleware('auth')->name('logout');
