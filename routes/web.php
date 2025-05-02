<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

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
    return redirect()->route('login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function() {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'user', 'middleware' => ['user']], function() {
    Route::get('/', [App\Http\Controllers\User\UserController::class, 'index'])->name('index');
});