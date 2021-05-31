<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
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
    Route::get('/', [UserController::class, "index"]);
    Route::get('/{id}', [UserController::class, "show"]);
});

Route::prefix('city')->group(function () {
    Route::get('/', [CityController::class, "index"]);
    Route::get('/{id}', [CityController::class, "show"]);
});

Route::prefix('state')->group(function () {
    Route::get('/', [StateController::class, "index"]);
    Route::get('/{id}', [StateController::class, "show"]);
});

Route::prefix('count')->group(function () {
    Route::get('/city', [CityController::class, "countCity"]);
    Route::get('/state', [StateController::class, "countState"]);
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, "index"]);
    Route::get('/{id}', [UserController::class, "show"]);
    Route::put('/{id}/update', [UserController::class, "update"]);
    Route::post('/add', [UserController::class, "store"]);
    Route::delete('/delete/{id}', [UserController::class, "destroy"]);
});
