<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\V1\TaskController;
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

Route::post('/login', [AuthController::class, 'login']);

/* Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
}); */

Route::middleware('auth:sanctum')->group( function () {
    Route::prefix('v1')->group(function(){
        Route::resource('tasks', TaskController::class);
    });
});



