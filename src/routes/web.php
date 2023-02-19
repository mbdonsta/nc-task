<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;
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

Route::middleware(['is-guest'])->prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
    Route::post('/post_login', [LoginController::class, 'postLogin'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'getRegister'])->name('register');
    Route::post('/post_register', [RegisterController::class, 'postRegister'])->name('register.post');
});

Route::middleware(['is-logged-in'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::name('task.')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('index');
        Route::get('/add', [TaskController::class, 'add'])->name('add');
        Route::post('/store', [TaskController::class, 'store'])->name('store');
    });

    Route::name('report.')->group(function () {
        Route::post('/generate', [ReportController::class, 'generate'])->name('generate');
    });
});
