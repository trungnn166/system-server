<?php

use App\Http\Controllers\manager\AuthController;
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

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('get-user-login', [AuthController::class, 'getUserLogin']);
    Route::get('logout', [AuthController::class, 'logout']);
});