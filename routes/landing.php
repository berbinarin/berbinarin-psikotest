<?php

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\PsikotesPaid\PsikotesPaidController;
use App\Http\Controllers\Landing\PsikotesPaid\SubmittedResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index']);

// Psikotes Paid
Route::middleware('auth')->prefix('psikotes-paid')->group(function() {
    Route::get('/', );



    Route::get('/tools/soal', function() {
        $psikotesTool = App\Models\PsikotesTool::all()[0];
        $psikotesTool->sections[0]->questions[0]->type = "multiple_select";
        $progress = 60;
        return view('landing.psikotes-paid.tools.question', compact('psikotesTool', 'progress'));
    });

    Route::get('/tools', [PsikotesPaidController::class, 'tools']);
    Route::get('/tools/{psikotesTool}/introduce', [PsikotesPaidController::class, 'introduce']);
    Route::get('/tools/{psikotesTool}/question', [SubmittedResponseController::class, 'question']);
    Route::post('/tools/{psikotesTool}/question', [SubmittedResponseController::class, 'store']);
    Route::post('/tools/{psikotesTool}/verify-token', [PsikotesPaidController::class, 'verifyToken']);
});