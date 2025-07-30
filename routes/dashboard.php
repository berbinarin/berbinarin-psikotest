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
use App\Http\Controllers\Dashboard\PTPM\Testimoni\TestimoniController;
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

        Route::get('/test-types/category/{category}', [TestTypeController::class, 'byCategory'])->name('test-types.by-category');
        Route::get('/test-types/category/{category}/create', [TestTypeController::class, 'create'])->name('test-types.create');
        Route::post('/test-types/category/{category}', [TestTypeController::class, 'store'])->name('test-types.store');
        Route::get('/test-types/category/{category}/edit/{id}', [TestTypeController::class, 'edit'])->name('test-types.edit');
        Route::put('/test-types/category/{category}/update/{id}', [TestTypeController::class, 'update'])->name('test-types.update');
        Route::delete('/test-types/category/{category}/delete/{id}', [TestTypeController::class, 'destroy'])->name('test-types.destroy');

        // Testimoni
        Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
        Route::get('/testimoni/{id}', [TestimoniController::class, 'show'])->name('testimoni.show');

        // Tools
        Route::prefix('tools')->name('tools.')->group(function () {
            Route::get('/{tool}/generate-token', [ToolController::class, 'generateToken'])->name('generate-token');

            // Data
            Route::prefix('{tool}/data')->name('data.')->group(function () {
                Route::get('/', [DataController::class, 'index'])->name('index');
                // Attempts
                Route::get('/attempts', [AttemptController::class, 'index'])->name('attempts.index');
                Route::get('/attempts/{attempt}', [AttemptController::class, 'show'])->name('attempts.show');
                // Sections
                Route::resource('/sections', SectionController::class)->only('index');
                Route::prefix('/sections/{section}')->name('sections.')->group(function () {
                    // Questions
                    Route::resource('/questions', QuestionController::class)->only('index');
            });
        });

            // Tambahkan baris ini untuk resource tools
            Route::resource('/', ToolController::class)->parameters(['' => 'tool']);
        });
    });
});
