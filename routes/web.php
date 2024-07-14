<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\DrugUseTrackerController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\Admin\HealthProController;
use App\Http\Controllers\AlcoholUseTrackerController;
use App\Http\Controllers\AvatarImageController;
use App\Http\Controllers\DepressionTrackerController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FilterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\HealthProfessionalProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PychologistController;
use App\Http\Controllers\ResultController;

Route::view('/', 'welcome');
Route::get('/pychologists', PychologistController::class);
Route::post('/search', ResultController::class);
Route::post('/filter', FilterController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/student/status', [StudentController::class, 'showSetStatus']);
    Route::get('/student/questions', [StudentController::class, 'showStatusQuestions']);
});
Route::get('/health_professional/{healthProfessionalProfile}', [UserController::class, 'showPsychologist'])->name('health_professional');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.k');

Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification Link Sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');    
        Route::resource('/chats', ChatMessageController::class);
        Route::resource('/students', StudentProfileController::class);
        Route::resource('/depressions', DepressionTrackerController::class);
        Route::resource('/notifications', NotificationController::class);
        Route::post('/book', [NotificationController::class, 'store']);
        Route::put('/book', [NotificationController::class, 'update'])->name('accept.offer');
        Route::get('/student/{id}', [UserController::class, 'showStudent']);
    }
);


Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::resource('/students', StudentProfileController::class);
        Route::resource('/professionals', HealthProfessionalProfileController::class);
        Route::resource('/alcohols', AlcoholUseTrackerController::class);
        Route::resource('/depressions', DepressionTrackerController::class);
        Route::resource('/drugs', DrugUseTrackerController::class);
        Route::patch('/profile/picture', AvatarImageController::class)->name('profile.picture');
    }
);

// Admin Controller
Route::post('admin/login', [AdminController::class, 'submit_login']);
Route::get('admin/login', [AdminController::class, 'login']);
Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/logout', [AdminController::class, 'logout']);

//student
Route::get('stu/{id}/delete', [StudentController::class, 'destroy']);
Route::resource('stu', StudentController::class);

//health-pro
Route::get('health/{id}/delete', [HealthProController::class, 'destroy']);
Route::resource('health', HealthProController::class);

//blog
Route::get('blog/{id}/delete', [BlogController::class, 'destroy']);
Route::resource('blog', BlogController::class);

Route::controller(GoogleController::class)->group(function () {
    Route::post('googleFinishUp', [GoogleController::class, 'finishUp'])->name('googleFinishUp');
    Route::get('social/google', 'redirect')->name('auth.google');
    Route::get('social/google/callback', 'googleCallback');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::post('/posts', [PostController::class, 'store'])->name('posts.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/experiences/create',[ExperienceController::class, 'create'])->middleware('auth');
Route::post('/experiences',[ExperienceController::class, 'store'])->middleware('auth');
Route::patch('/experiences/{experience}',[ExperienceController::class, 'update'])->middleware('auth');
Route::get('/experiences/{experience}/edit',[ExperienceController::class, 'edit'])->middleware('auth');
Route::delete('/experiences/{experience}',[ExperienceController::class, 'destroy'])->middleware('auth');

require __DIR__ . '/auth.php';
