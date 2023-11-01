<?php

use Illuminate\Http\Request;
use App\Http\Controllers\MyApiController;
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


Route::get('/hello', function () {
    return 'Hello, World!';
});

Route:: get('checking', [MyApiController::class, 'licenseKey']);
Route:: get('index', [MyApiController::class, 'apiconnect']);
Route:: get('info', [MyApiController::class, 'getIP']);
Route:: post('filter', [MyApiController::class, 'filter']);
Route:: get('jayson', [MyApiController::class, 'easypaisa']);


Route:: get('sampleapi', [MyApiController::class, 'connect']);