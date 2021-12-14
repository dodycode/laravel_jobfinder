<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Landing\LandingController;
use Illuminate\Support\Facades\Route;
use App\Helpers\Stopwords;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('index.landing');
Route::post('/result', [LandingController::class, 'results'])->name('index.result');

// Login Admin
Route::get('/admin', [LoginController::class, 'index'])->name('admin');

Route::prefix('/')->group(function () {
    Route::get('/login', function () {
        return redirect()->to('/admin');
    })->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/welcome', [DashboardController::class, 'index'])->name('index.welcome');
        Route::get('/list-jobs', [DashboardController::class, 'listJob'])->name('list.job');
        Route::get('/add-job', [DashboardController::class, 'addJob'])->name('add.job');
        Route::post('/add-job', [DashboardController::class, 'storeJob']);
        Route::delete('/list-jobs-{id}', [DashboardController::class, 'destroy'])->name('delete.job');

        Route::get('/edit-job-{id}', [DashboardController::class, 'editJob'])->name('edit.job');
        Route::post('/update-job-{id}', [DashboardController::class, 'updateJob'])->name('update.job');
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
