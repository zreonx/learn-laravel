<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\EnsureEmailIsNotVerified;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/posts');

Route::resource('posts', PostController::class);
Route::get('/{user}/posts', [DashboardController::class, 'userPosts'])->name('posts.user');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Email verification notice
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->middleware(EnsureEmailIsNotVerified::class)->name('verification.notice');

    //Email verification handler
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['signed'])->name('verification.verify');

    //Resend verification email
    Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->middleware(['throttle:6,1'])->name('verification.send');
});


Route::middleware('guest')->group(function () {

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);

});



