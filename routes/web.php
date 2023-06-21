<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalTrainerController;
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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('jadwal', JadwalController::class);
    Route::resource('trainer', TrainerController::class);
    Route::resource('jadwal_trainer', JadwalTrainerController::class);
});




require __DIR__ . '/auth.php';
