<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PTPM\PriceList\TestCategoryController;
use App\Http\Controllers\Dashboard\PTPM\PriceList\TestTypeController;
use App\Http\Controllers\Dashboard\PTPM\Registrant\RegistrantController;
use App\Http\Controllers\Dashboard\PTPM\Tool\AttemptController;
use App\Http\Controllers\Dashboard\PTPM\Tool\DataController;
use App\Http\Controllers\Dashboard\PTPM\Tool\QuestionController;
use App\Http\Controllers\Dashboard\PTPM\Tool\SectionController;
use App\Http\Controllers\Dashboard\PTPM\Tool\ToolController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {

    // Dashbaord
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Psychological Test Product Management
    Route::middleware('role:ptpm_psikotes-paid')->group(function () {

        // Registrants
        Route::resource('/registrants', RegistrantController::class);

        // Price Lists
        Route::resource('/test-categories', TestCategoryController::class);
        Route::resource('/test-types', TestTypeController::class);

        // Tools
        Route::prefix('tools')->name('tools.')->group(function () {
            Route::get('/', [ToolController::class, 'index'])->name('index');
            Route::get('/{tool}/generate-token', [ToolController::class, 'generateToken'])->name('generate-token');

            // Data
            Route::prefix('{tool}/data')->name('data.')->group(function () {
                Route::get('/', [DataController::class, 'index'])->name('index');

                // Attempt
                Route::get('/attempts', [AttemptController::class, 'index'])->name('attempts.index');
                Route::get('/attempts/{attempt}', [AttemptController::class, 'show'])->name('attempts.show');
                
                // Sections

                Route::resource('/sections', SectionController::class)->only('index');
                
                // Questions
                Route::prefix('/sections/{section}')->name('sections.')->group(function () {
                    Route::resource('/questions', QuestionController::class)->only('index');
                });
            });
        });
    });
});
