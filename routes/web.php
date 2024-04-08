<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ChatMessageController;

Route::get('/', function () {
    return view('home.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
   
    // for users side bar
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index']);
        Route::put('/update/{id}', [UserController::class, 'update']);
        Route::Delete('/delete/{id}', [UserController::class, 'destroy']);

    });
  
    


    // for blogs side bar
    Route::prefix('blog')->group(function(){
        Route::get('/', [BlogController::class, 'index']);
        Route::put('/update/{id}', [BlogController::class, 'update']);
        Route::Delete('/delete/{id}', [BlogController::class, 'destroy']);
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/chats', ChatMessageController::class);
});

Route::resource('/blogs', BlogController::class);

require __DIR__.'/auth.php';
