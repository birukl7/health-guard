<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/chats', ChatMessageController::class);
});

Route::resource('/blogs', BlogController::class);

require __DIR__.'/auth.php';
