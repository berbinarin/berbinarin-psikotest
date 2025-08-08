<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        // Admin Login
        Route::get('login', [AuthenticatedSessionController::class, 'login'])->name('login');

        // Psikotes Paid Registration
        Route::get('psikotes-paid/daftar', [RegisteredUserController::class, 'psikotesPaidRegister'])->name('psikotes-paid.register');
        Route::post('psikotes-paid/daftar', [RegisteredUserController::class, 'psikotesPaidRegisterStore'])->name('psikotes-paid.register');
        Route::get('/psikotes-paid/daftar/check-email', [RegisteredUserController::class, 'checkEmail'])->name('psikotes-paid.register.check-email');

        // Psikotes Paid Login
        Route::get('psikotes-paid/login', [AuthenticatedSessionController::class, 'psikotesPaidLogin'])->name('psikotes-paid.login');

        // Psikotes Paid Login
        Route::get('psikotes-paid/summary', [RegisteredUserController::class, 'summary'])->name('psikotes-paid.register.summary');


        // Authenticate
        Route::post('authenticate', [AuthenticatedSessionController::class, 'authenticate'])->name('authenticate');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
});
