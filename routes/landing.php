<?php

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\PsikotesPaid\PsikotesPaidController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index']);

// Psikotes Paid
Route::middleware('auth')->prefix('psikotes-paid')->group(function() {
    Route::get('/tools', [PsikotesPaidController::class, 'tools']);
    Route::get('/tools/{psikotesTool}', [PsikotesPaidController::class, 'landing']);
    Route::post('/tools/{psikotesTool}/verify-token', [PsikotesPaidController::class, 'verifyToken']);
});