<?php

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\PsikotesPaid\PsikotesPaidController;
use App\Http\Controllers\Landing\PsikotesPaid\SubmittedResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index']);

// Psikotes Paid
Route::middleware('auth')->prefix('psikotes-paid')->group(function() {
    Route::get('/tools', [PsikotesPaidController::class, 'tools']);
    Route::get('/tools/{tool}/introduce', [PsikotesPaidController::class, 'introduce']);
    Route::get('/tools/{tool}/question', [SubmittedResponseController::class, 'queastion']);
    Route::post('/tools/{tool}/question', [SubmittedResponseController::class, 'store']);
    Route::post('/tools/{tool}/verify-token', [PsikotesPaidController::class, 'verifyToken']);
});