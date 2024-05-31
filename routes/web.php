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

//authcontroller route
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/register',[AuthController::class,'register_view'])->name('register');

Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/home',[AuthController::class,'show_user'])->name('home');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//scr question bank
use App\Http\Controllers\ScrChapterController;

Route::get('/scr_questions', [ScrChapterController::class, 'showDashboard'])->name('scr_q')->middleware('auth');



// use App\Http\Controllers\QuizController;

// Route::get('/questions', function () {
//     return view('users.series.questions');
// })->name('questions');
// Route::get('/questions', [QuizController::class, 'getQuestions']);
use App\Http\Controllers\QuizController;

Route::get('/questions/{chapter_id}/{test}', [QuizController::class, 'getQuestions'])->name('get.questions');
Route::post('/submitquiz', [QuizController::class, 'submitQuiz'])->name('submitquiz');



