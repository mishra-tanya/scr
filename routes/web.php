<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('wel');

Route::get('/home', function () {
    return view('users.home');
})->name('home');

Route::get('/results', function () {
    return view('users.series.results');
})->name('home');



use App\Http\Controllers\AuthController;

Route::get('/deploy', [AuthController::class, 'deploy']);
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/register',[AuthController::class,'register_view'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\PaymentController;
Route::get('/payment', [PaymentController::class, 'show'])->name('payment.page')->middleware('auth');
Route::post('/trial-request', [PaymentController::class ,'store'])->name('trial.request')->middleware('auth');

use App\Http\Controllers\ForgotPasswordController;

Route::post('forgot-password', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ForgotPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('reset-password', [ForgotPasswordController::class,'reset'])->name('password.update');


use App\Http\Controllers\ScrChapterController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\LearningObjController;

Route::middleware(['auth', 'is_user','check.trial'])->group(function () {
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

    Route::post('/update-email-notification/{user}', [AuthController::class,'updateEmailNotification'])->name('update.email.notification');

});

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionLimitController;
use App\Http\Controllers\UserController;

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::prefix('admin')->middleware(['is_admin'])->group(function ()  {
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

    Route::get('/{email}/learning_obj_result/{chapter_id}/{test}',[UserController::class,'userloResult'])->name('userloResult');
    Route::get('/scrtest/{chapter_id}', [UserController::class, 'viewScrTestDetails'])->name('admin.scr.test.details');
    
    Route::get('dashboard',[UserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/user/{email}', [UserController::class, 'showUserDetails'])->name('user.details');

    Route::post('/admin/send-email/{id}', [UserController::class, 'sendEmail'])->name('admin.send.email');
    
});

