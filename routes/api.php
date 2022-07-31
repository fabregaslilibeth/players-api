<?php

use App\Http\Controllers\Api\DataImportController;
use App\Http\Controllers\Api\PlayerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('players', PlayerController::class)->only(['store', 'index']);
Route::post('imports', [DataImportController::class, 'store']);
Route::get('players', [PlayerController::class, 'fetch']);
