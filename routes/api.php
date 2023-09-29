<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index');
    });

    Route::prefix('categories')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index');
    });

    Route::prefix('topics')->controller(TopicController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::patch('/{id}/edit', 'update');
    });
});
