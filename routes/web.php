<?php

use App\Http\Controllers\Landing\Psikotes\PsikotesPaidController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//menambahkan Semua route auth
require __DIR__ . '/auth.php';

// menambahkan Semua route landing
require __DIR__ . '/landing.php';

// menambahkan Semua route dashboard
require __DIR__ . '/dashboard.php';
