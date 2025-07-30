<?php

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\PsikotesPaid\PsikotesPaidController;
use App\Http\Controllers\Landing\PsikotesPaid\SubmittedResponseController;
use App\Http\Controllers\Landing\PsikotesPaid\TestimonialController;
use App\Http\Controllers\Landing\PsikotesPaid\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home.index');

// Psikotes Paid
Route::middleware(['auth', 'session.verified'])->prefix('psikotes-paid')->name('psikotes-paid.')->group(function () {
    // Tool
    Route::prefix('tools')->name('tools.')->group(function () {
        Route::get('/', [ToolController::class, 'index'])->name('index');
        Route::post('/verify-token', [ToolController::class, 'verifyToken'])->name('verify-token');
    });

    // Attempt
    Route::prefix('attempt')->name('attempt.')->group(function () {
        Route::get('/introduce', [SubmittedResponseController::class, 'introduce'])->name('introduce');
        Route::get('/question', [SubmittedResponseController::class, 'question'])->name('question');
        Route::post('/question', [SubmittedResponseController::class, 'submit'])->name('submit');
        Route::get('/complete', [SubmittedResponseController::class, 'complete'])->name('complete');
        Route::post('/times-up', [SubmittedResponseController::class, 'timesUp'])->name('times-up');
    });

    // Testimonial
    Route::prefix('testimoni')->name('testimonial.')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::post('/store', [TestimonialController::class, 'store'])->middleware('auth')->name('store');
    });
});
