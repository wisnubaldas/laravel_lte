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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('level-air',[App\Http\Controllers\GrafikAirController::class,'index']);
Route::post('send-data-sensor/{id}',[App\Http\Controllers\GrafikAirController::class,'create']);
Route::post('level-air',[App\Http\Controllers\GrafikAirController::class,'create']);
Route::get('data-bmkg',[App\Http\Controllers\GrafikAirController::class,'data_bmkg']);
Route::get('get-data-bmkg',[App\Http\Controllers\GrafikAirController::class,'get_data_bmkg']);
Route::get('get-data-status/{id}', [App\Http\Controllers\GrafikAirController::class,'get_status']);
Route::get('send-data-status/{id}', [App\Http\Controllers\GrafikAirController::class,'send_status']);



