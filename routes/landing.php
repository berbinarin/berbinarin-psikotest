<?php

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\PsikotesPaid\PsikotesPaidController;
use App\Http\Controllers\Landing\PsikotesPaid\SubmittedResponseController;
use App\Models\Question;
use App\Models\Tool;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home.index');

// Psikotes Paid
Route::middleware('auth')->prefix('psikotes-paid')->name('psikotes-paid.')->group(function() {
    Route::get('/tools', [PsikotesPaidController::class, 'tools'])->name('index');
    Route::get('/tools/{tool}/introduce', [PsikotesPaidController::class, 'introduce'])->name('introduce');
    Route::get('/tools/{tool}/question', [SubmittedResponseController::class, 'question'])->name('question');;
    Route::post('/tools/{tool}/question', [SubmittedResponseController::class, 'store'])->name('question.store');
    Route::post('/tools/{tool}/verify-token', [PsikotesPaidController::class, 'verifyToken'])->name('verify-token');
    Route::get('/tools/{tool}/summary', [PsikotesPaidController::class, 'summary'])->name('summary');
});