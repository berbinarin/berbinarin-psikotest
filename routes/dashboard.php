<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PTPM\PriceList\TestCategoryController;
use App\Http\Controllers\Dashboard\PTPM\PriceList\TestTypeController;
use App\Http\Controllers\Dashboard\PTPM\Registrant\RegistrantController;
use App\Http\Controllers\Dashboard\PTPM\Tool\PsikotesToolController;
use App\Http\Controllers\Dashboard\PTPM\Tool\PsikotesToolDataController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {

    // Dashbaord
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Psychological Test Product Management
    Route::middleware('role:ptpm')->group(function () {

        Route::resource('/registrants', RegistrantController::class);
        Route::resource('/test-categories', TestCategoryController::class);
        Route::resource('/test-types', TestTypeController::class);

        Route::prefix('tools')->name('tools.')->group(function () {
            // Psikotes Tool
            Route::resource('/', PsikotesToolController::class)->except('show');
            Route::post('/{tool}/generate-token', [PsikotesToolController::class, 'generateToken'])->name('generate_token');

            Route::name('data.')->group(function () {
                // Psikotes Tool Dashboard
                Route::get('/{tool}', [PsikotesToolDataController::class, 'index'])->name('index');
                Route::get('/{tool}/data', [PsikotesToolDataController::class, 'data'])->name('data');
                Route::get('/{tool}/data/{session}', [PsikotesToolDataController::class, 'detail'])->name('data.detail');
                Route::get('/{tool}/sections', [PsikotesToolDataController::class, 'sections'])->name('sections');
                Route::get('/{tool}/sectinos/{section}', [PsikotesToolDataController::class, 'questions'])->name('section.questions');
            });
        });
    });
});
