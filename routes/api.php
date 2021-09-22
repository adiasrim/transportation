<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\Transportation\TransportationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['as' => 'auth.', 'prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::post('register', [AuthenticationController::class, 'register'])->name('register');
    Route::post('login', [AuthenticationController::class, 'login'])->name('login');
});

Route::group(['as' => 'transportation.', 'prefix' => 'transportation'], function () {
    Route::get('/', [TransportationController::class, 'index'])->name('index');
    Route::post('/add', [TransportationController::class, 'store'])->name('store');
});
