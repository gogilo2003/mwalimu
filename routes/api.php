<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\SubjectController;

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

Route::name('api.v1')->prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [AuthController::class, 'user'])->name('.user');
        Route::get('/token', [AuthController::class, 'token'])->name('.token');

        Route::name('.subjects')->prefix('subjects')->group(function(){
            Route::get('{id?}',[SubjectController::class,'index']);
            Route::post('',[SubjectController::class,'store'])->name('.store');
            Route::patch('',[SubjectController::class,'update'])->name('.update');
            Route::delete('{id}',[SubjectController::class,'destroy'])->name('.delete');
        });
    });

    Route::middleware('guest')->group(function(){
        Route::post('login', [AuthController::class, 'login'])->name('.login');
    });
});
