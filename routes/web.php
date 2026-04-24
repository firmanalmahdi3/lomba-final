<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| Festival Lampung — Web Routes
|----------------------------------------------------------------------
*/

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Us
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Voting
Route::prefix('voting')->name('voting.')->group(function () {
    Route::get('/',           [VotingController::class, 'index'])      ->name('index');
    Route::post('/{candidate}', [VotingController::class, 'vote'])     ->name('vote');
    Route::get('/leaderboard', [VotingController::class, 'leaderboard'])->name('leaderboard');
    Route::get('/stats',       [VotingController::class, 'stats'])     ->name('stats');
});

// Auth
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');
