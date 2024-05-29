<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});

//dashboard
Route::get('/home', function () {
    return view('users.home');
})->name('home');

//scr_questions
Route::get('/scr_questions', function () {
    return view('users.series.scr_questions');
})->name('home')->middleware('auth');;

//authcontroller route
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/register',[AuthController::class,'register_view'])->name('register');

Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/home',[AuthController::class,'show_user'])->name('home');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//scr question bank
// Route::get('/login',[AuthController::class,'index'])->name('login');
