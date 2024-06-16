<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('users.home');
})->name('home');

Route::get('/results', function () {
    return view('users.series.results');
})->name('home');



use App\Http\Controllers\AuthController;

Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/register',[AuthController::class,'register_view'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\ScrChapterController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\LearningObjController;

Route::middleware(['auth', 'is_user'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/home',[AuthController::class,'show_user'])->name('home');

    Route::get('/result/{chapter_id}',[ResultController::class,'getResult'])->name('result.show');

    Route::get('/scr_questions', [ScrChapterController::class, 'showDashboard'])->name('scr_q');

    Route::get('/scr_questions/{chapter_id}/{test}', [QuizController::class, 'getQuestions'])->name('get.questions');
    Route::post('/submitquiz', [QuizController::class, 'submitQuiz'])->name('submitquiz');
    Route::post('/update-test-status', [QuizController::class, 'updateTestStatus'])->name('update-test-status');
    Route::get('/scr_questions/{chapter_id}', [QuizController::class, 'getMockQuestions'])->name('getMockQuestions');
    
    Route::get('/learning_obj', [LearningObjController::class, 'index'])->name('learningObj');
    Route::get('/questions/{chapter_id}/{test}', [LearningObjController::class, 'getLoQuestions'])->name('getLoQuestions');
    Route::get('/learning_obj_result/{chapter_id}/{test}',[LearningObjController::class,'getLoResult'])->name('getLoResult');
    Route::post('/lo_submit', [LearningObjController::class, 'lo_submit'])->name('lo_submit');
});

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionLimitController;
use App\Http\Controllers\UserController;


Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::get('register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('register', [AdminAuthController::class, 'register']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/add_questions', function () {
        return view('admin.add_questions');
    })->name('admin.add_question');
    Route::post('/questions/scr/store', [QuestionController::class, 'storeSCR'])->name('questions.scr.store');
    Route::post('/questions/mock/store', [QuestionController::class, 'storeMock'])->name('questions.mock.store');
    Route::post('/questions/lo/store', [QuestionController::class, 'storeLO'])->name('questions.lo.store');
    Route::post('/store-question-limit', [QuestionLimitController::class, 'store'])->name('store.question.limit');
    Route::get('/limit_ques', [QuestionLimitController::class, 'index'])->name('question.limits');
    Route::get('/fetch-learning-objectives/{chapterId}', [QuestionController::class, 'fetchLearningObjectives']);
    Route::get('/dashboard/user', [UserController::class, 'index'])->name('dashboard.users.admin');

})->middleware('is_admin');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

