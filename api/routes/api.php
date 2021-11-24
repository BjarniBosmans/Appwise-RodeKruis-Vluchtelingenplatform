<?php

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

//
//Route::middleware('auth:sanctum')->group(function() {

    Route::get('/refugees' , [\App\Http\Controllers\UserController::class, 'showRefugees']);
    Route::post('/refugees/add', [\App\Http\Controllers\UserController::class, 'addRefugee']);

    Route::get('/attendants', [\App\Http\Controllers\UserController::class, 'showAttendants']);
    Route::post('/attendants/add', [\App\Http\Controllers\UserController::class, 'addAttendant']);



//});
