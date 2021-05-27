<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::prefix('address')->group(function () {
    Route::get('/', [UserController::class, "indexAddress"]);
    Route::get('/{id}', [UserController::class, "showAddress"]);
});

Route::prefix('city')->group(function () {
    Route::get('/', [UserController::class, "indexCity"]);
    Route::get('/{id}', [UserController::class, "showCity"]);
});

Route::prefix('state')->group(function () {
    Route::get('/', [UserController::class, "indexState"]);
    Route::get('/{id}', [UserController::class, "showState"]);
});

Route::prefix('count')->group(function () {
    Route::get('/city', [UserController::class, "countCity"]);
    Route::get('/state', [UserController::class, "countState"]);
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, "index"]);
    Route::get('/{id}', [UserController::class, "showUsers"]);
    Route::put('/{id}/update', [UserController::class, "updateUser"]);
    Route::post('/add', [UserController::class, "store"]);
    Route::delete('/delete/{id}', [UserController::class, "destroy"]);
});
