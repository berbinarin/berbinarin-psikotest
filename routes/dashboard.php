<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesToolController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesToolDataController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {

    // Dashbaord
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Psychological Test Product Management
    Route::middleware('role:ptpm')->group(function () {

        Route::prefix('psikotes-tools')->name('psikotes-tools.')->group(function () {
            // Psikotes Tool
            Route::resource('/', PsikotesToolController::class)->except('show');
            Route::post('/{psikotesTool}/generate-token', [PsikotesToolController::class, 'generateToken'])->name('generate_token');

            Route::name('data.')->group(function() {
                // Psikotes Tool Dashboard
                Route::get('/{psikotesTool}', [PsikotesToolDataController::class, 'index'])->name('index');
                Route::get('/{psikotesTool}/data', [PsikotesToolDataController::class, 'data'])->name('data');
                Route::get('/{psikotesTool}/data/{psikotesSession}', [PsikotesToolDataController::class, 'detail'])->name('data.detail');
                Route::get('/{psikotesTool}/sections', [PsikotesToolDataController::class, 'sections'])->name('sections');
                Route::get('/{psikotesTool}/sectinos/{psikotesSection}', [PsikotesToolDataController::class, 'questions'])->name('section.questions');
            });
        });
    });
});
