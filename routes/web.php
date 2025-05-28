<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMedicineController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\MedicineController;

Route::get('/', fn () => redirect()->route('login'));

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.dashboard'));
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('medicines', MedicineController::class);
});

// User Routes
Route::prefix('user')->name('user.')->middleware('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
});
