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

Route::post('/loginRefugee', [\App\Http\Controllers\Auth\LoginController::class, 'loginRefugee']);
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function() {

    Route::get('/refugee/{user}', [\App\Http\Controllers\UserController::class, 'showRefugee']);
    Route::get('/refugees/attendant/{user}', [\App\Http\Controllers\UserController::class, 'showRefugeesForAttendant']);
    Route::get('/refugees' , [\App\Http\Controllers\UserController::class, 'showRefugees']);
    Route::post('/refugees/add', [\App\Http\Controllers\UserController::class, 'addRefugee']);

    Route::get('/attendants', [\App\Http\Controllers\UserController::class, 'showAttendants']);
    Route::post('/attendants/add', [\App\Http\Controllers\UserController::class, 'addAttendant']);

    Route::get('/cards', [\App\Http\Controllers\CardController::class, 'showCards']);
    Route::get('/cards/refugee/{user}' ,[\App\Http\Controllers\CardController::class,'showCardsForRefugee']);

    Route::post('/cards/add', [\App\Http\Controllers\CardController::class, 'addCard']);

    Route::get('/cards/tasks/{card}', [\App\Http\Controllers\CardController::class, 'showCardTasks']);
    Route::post('/cards/tasks/add', [\App\Http\Controllers\CardController::class, 'addTask']);
    Route::patch('cards/tasks/update', [\App\Http\Controllers\CardController::class, 'changeTaskTicks']);

    Route::get('/types', [\App\Http\Controllers\CardController::class, 'showTypes']);
    Route::post('/types/add', [\App\Http\Controllers\CardController::class, 'addType']);

    Route::delete('/deactivateUser/{user}', [\App\Http\Controllers\UserController::class, 'deactivateUser']);

    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

});
