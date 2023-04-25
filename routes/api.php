<?php

declare(strict_types=1);

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->controller(AuthController::class)->group(function () {
   Route::post('register', 'register')->name('auth.register');
   Route::post('login', 'login')->name('auth.login');
   Route::post('logout', 'logout')->name('auth.logout');
});

Route::middleware('auth:sanctum')->controller(ReviewController::class)->group(function () {
    Route::post('reviews', 'store')->name('store.reviews');
    Route::get('reviews', 'index')->name('index.reviews');
});

Route::middleware(['auth:sanctum', 'admin'])->controller(AnswerController::class)->group(function () {
   Route::post('answers', 'store')->name('store.answers');
});

