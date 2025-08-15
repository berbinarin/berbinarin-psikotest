<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesFree\FreeProfileData\PsikotesFreeProfileController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\PriceList\TestCategoryController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\PriceList\TestTypeController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Registrant\RegistrantController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool\AttemptController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool\DataController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool\QuestionController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool\SectionController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool\ToolController;
use App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Testimonial\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {

    // Dashbaord
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Psychological Test Product Management - Paid
    Route::middleware('role:ptpm_psikotes-paid')->group(function () {

        // Registrants
        Route::prefix('registrants')->name('registrants.')->group(function () {
            Route::get('/', [RegistrantController::class, 'index'])->name('index');
            Route::get('/create', [RegistrantController::class, 'create'])->name('create');
            Route::post('/', [RegistrantController::class, 'store'])->name('store');
            Route::get('/{id}', [RegistrantController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [RegistrantController::class, 'edit'])->name('edit');
            Route::put('/{id}', [RegistrantController::class, 'update'])->name('update');
            Route::delete('/{id}', [RegistrantController::class, 'destroy'])->name('destroy');
        });

        // Price Lists
        Route::prefix('price-list')->name('price-list.')->group(function () {
            Route::get('/test-categories', [TestCategoryController::class, 'index'])->name('test-category.index');
            Route::get('/test-types/category/{category}', [TestTypeController::class, 'byCategory'])->name('test-types.by-category');
            Route::get('/test-types/category/{category}/create', [TestTypeController::class, 'create'])->name('test-types.create');
            Route::post('/test-types/category/{category}', [TestTypeController::class, 'store'])->name('test-types.store');
            Route::get('/test-types/category/{category}/edit/{id}', [TestTypeController::class, 'edit'])->name('test-types.edit');
            Route::put('/test-types/category/{category}/update/{id}', [TestTypeController::class, 'update'])->name('test-types.update');
            Route::delete('/test-types/category/{category}/delete/{id}', [TestTypeController::class, 'destroy'])->name('test-types.destroy');
        });

        // Tools
        Route::prefix('tools')->name('tools.')->group(function () {
            Route::put('/{tool}/generate-token', [ToolController::class, 'generateToken'])->name('generate-token');

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

        // Testimonial
        Route::prefix('testimonial')->name('testimonial.')->group(function (){
            Route::get('/', [TestimonialController::class, 'index'])->name('index');
            Route::get('/{id}', [TestimonialController::class, 'show'])->name('show');
            Route::delete('/{id}', [TestimonialController::class, 'destroy'])->name('destroy');
        });
    });

    // Psychological Test Product Management - Free
    Route::middleware('role:ptpm_psikotes-free')->group(function () {

        // Psikotes Free Profiles
        Route::prefix('free-profiles')->name('free-profiles.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
            Route::get('/data', [PsikotesFreeProfileController::class, 'index'])->name('data.show');
            Route::get('/data/detail/{id}', [PsikotesFreeProfileController::class, 'show'])->name('data.detail');
            Route::delete('/{id}', [PsikotesFreeProfileController::class, 'destroy'])->name('destroy');
        });
    });
});
