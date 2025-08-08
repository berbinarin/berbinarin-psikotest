<?php

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\PsikotesPaid\PsikotesPaidController;
use App\Http\Controllers\Landing\PsikotesPaid\SubmittedResponseController;
use App\Http\Controllers\Landing\PsikotesPaid\TestimonialController;
use App\Http\Controllers\Landing\PsikotesPaid\ToolController;
use App\Http\Controllers\Landing\PsikotesFree\PsikotesFreeController;
use App\Http\Controllers\Landing\PsikotesFree\PsikotesFreeProfileController;
use App\Http\Controllers\Landing\PsikotesFree\TestController;
use App\Http\Controllers\Landing\PsikotesFree\FeedbackController;
use App\Http\Controllers\Landing\PsikotesFree\ResultController;
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
        Route::get('/instruksi', [SubmittedResponseController::class, 'introduce'])->name('introduce');
        Route::get('/soal', [SubmittedResponseController::class, 'soal'])->name('question');
        Route::post('/soal', [SubmittedResponseController::class, 'submit'])->name('submit');
        Route::get('/selesai', [SubmittedResponseController::class, 'complete'])->name('complete');
        Route::post('/times-up', [SubmittedResponseController::class, 'timesUp'])->name('times-up');
    });

    // Testimonial
    Route::prefix('testimoni')->name('testimonial.')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::post('/store', [TestimonialController::class, 'store'])->middleware('auth')->name('store');
    });
});

// Psikotes Free
Route::prefix('psikotes-free')->name('psikotes-free.')->group( function() {
    Route::get('/biodata', [PsikotesFreeProfileController::class, 'index'])->name('profile');
    Route::post('/biodata/store', [PsikotesFreeProfileController::class, 'store'])->name('profile.store');
    Route::get('/pengenalan', [PsikotesFreeController::class, 'introduce'])->name('introduce');
    Route::post('/attempt', [TestController::class, 'attempt'])->name('attempt');
    Route::get('/tes', [TestController::class, 'test'])->name('test');
    Route::post('/submit', [TestController::class, 'submit'])->name('submit');
    Route::get('/umpan-balik', [FeedbackController::class, 'show'])->name('feedback.show');
    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/hasil',[ResultController::class, 'result'])->name('result');
    Route::post('/times-up', [TestController::class, 'timesUp'])->name('attempt.times-up');
    Route::get('/selesai', [ResultController::class, 'finish'])->name('finish');
});
