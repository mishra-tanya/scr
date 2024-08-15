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

use App\Http\Controllers\ContactController;

Route::post('contact', [ContactController::class, 'submitForm'])->name('contact.submit');


use App\Http\Controllers\AuthController;

Route::get('/deploy', [AuthController::class, 'deploy']);
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/register',[AuthController::class,'register_view'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/verify/{token}', [AuthController::class, 'verify'])->name('verify');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/resend-verification-email', [AuthController::class, 'resend'])->name('verification.resend');

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
use App\Http\Controllers\NotesController;
use App\Http\Controllers\PaymentIntegrationController;
use App\Http\Controllers\PhonePeController;


Route::get('/payment_scr', [PaymentIntegrationController::class, 'initiatePayment'])->name('payment.initiate')->middleware('auth');
Route::post('/payment/callback', [PaymentIntegrationController::class, 'handlePayment'])->name('payment.callback')->middleware('auth');

Route::post('/phonepe/initiate', [PhonePeController::class, 'initiatePayment'])->name('phonepe.initiate')->middleware('auth');
Route::middleware(['web'])->group(function () {
    Route::post('/phonepe/callback', [PhonePeController::class, 'handleCallback'])->name('phonepe.callback');
});

Route::get('/payment/success', function () {
    return view('payment.success');
})->name('payment.success')->middleware('auth');

Route::get('/payment/failed', function () {
    return view('payment.failed');
})->name('payment.failed')->middleware('auth');

Route::get('/account-deactivated', function () {
    return view('account-deactivated');
})->name('account-deactivated')->middleware('auth');


Route::middleware(['auth', 'is_user','check.trial','check.deactivated','email.verified'])->group(function () {
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

    Route::get('/scr_notes', [NotesController::class, 'index'])->name('scr_notes.index');
    Route::get('/scr_notes/{chapter}', [NotesController::class, 'getchapternotes'])->name('getchapternotes');
    Route::post('/submit_notes', [NotesController::class, 'store'])->name('store.notes');

    Route::get('/flash_cards', [NotesController::class, 'flashCards'])->name('flash_cards');
    Route::get('/scr_videos', function () {
        return view('users.notes.videos');
    })->name('scr_videos');
    
    Route::get('/flash_card/{chapter}/{id}', [NotesController::class, 'flash_lo'])->name('flash_card_detail');
    Route::post('/savequiz', [QuizController::class, 'saveQuiz'])->name('savequiz');

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
    Route::post('/admin/update-payment-status', [UserController::class, 'updatePaymentStatus'])->name('admin.updatePaymentStatus');

    Route::put('/trial-requests/{id}/update-trial-days', [UserController::class, 'updateTrialDays'])->name('update.trial.days');
    Route::post('/toggle-account-status', [UserController::class, 'toggleAccountStatus'])->name('admin.toggleAccountStatus');

    Route::get('contact/messages', [ContactController::class, 'showMessages'])->name('contact.messages');

    Route::get('/paid_user_reg', function () {
        return view('admin.paid_user_reg');
    })->name('admin.paid_user');

    Route::post('/paid_user_reg',[AuthController::class,'paid_register'])->name('paid_user');


});

