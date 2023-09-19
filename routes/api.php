<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Models\Client;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // ...

    // public routes
    Route::post('login', [AuthController::class, 'login']);
    Route::get('clients', [ClientController::class, 'index']);
    Route::post('clients', [ClientController::class, 'store']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('update', [ClientController::class, 'update']);
    Route::post('delete-clients', [ClientController::class, 'destroy']);
    Route::post('find/{id}', [ClientController::class, 'show']);
    Route::post('logout', [ClientController::class, 'logout']);


    // ...

});