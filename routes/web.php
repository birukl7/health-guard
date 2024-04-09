<?php

use App\Models\User;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepressionTrackerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $doctors = User::whereHas('roles', function ($query) {
        $query->where('name', 'health_professional');
    })->get();
    return view('home.index', ['doctors' => $doctors]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified'])->get('health_professional/{id}', [UserController::class, 'showPsychologist'])->name('health_professional');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


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

        Route::patch(
            '/profile/picture',
            function (Request $request) {
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the uploaded file
                ]);

                if ($request->hasFile('avatar')) {
                    $avatarFileName = time() . '.' . $request->avatar->getClientOriginalExtension();
                    $request->avatar->storeAs('public/users-avatar', $avatarFileName); // Store the uploaded image in storage

                    // Update user's avatar column
                    $user = Auth::user();
                    $user->avatar = $avatarFileName;
                    $user->save();

                    return redirect()->back()->with('success', 'Avatar uploaded successfully.');
                }

                return redirect()->back()->with('error', 'Failed to upload avatar.');
            }
        )->name('profile.picture');
    }
);

Route::controller(GoogleController::class)->group(function () {
    Route::get('social/google', 'redirect')->name('auth.google');
    Route::get('social/google/callback', 'googleCallback');
});


Route::resource('/blogs', BlogController::class);

require __DIR__ . '/auth.php';
