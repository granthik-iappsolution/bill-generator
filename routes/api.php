<?php

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

Route::post('register', [\App\Http\Controllers\API\Auth\RegistrationController::class, 'register']);

Route::group(['middleware' => ['auth:api']], function(){
    Route::post('change-password', [\App\Http\Controllers\API\Auth\ChangePasswordController::class, 'changePassword']);
});
