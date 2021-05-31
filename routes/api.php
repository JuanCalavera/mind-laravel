<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
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
    Route::get('/', [AddressController::class, "index"]);
    Route::post('/addaddress', [AddressController::class, "store"]);
    Route::put('/{id}/update', [AddressController::class, "update"]);
    Route::get('/{id}', [AddressController::class, "show"]);
    Route::delete('/delete/{id}', [AddressController::class, "destroy"]);
});

Route::prefix('city')->group(function () {
    Route::get('/', [CityController::class, "index"]);
    Route::post('/add', [CityController::class, "store"]);
    Route::put('/{id}/update', [CityController::class, "update"]);
    Route::get('/{id}', [CityController::class, "show"]);
    Route::delete('/delete/{id}', [CityController::class, "destroy"]);
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
