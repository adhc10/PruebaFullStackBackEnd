<?php

use App\Http\Controllers\BillsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ExceptionsController;
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

Route::resource('clients',ClientsController::class)->only(['index','store','update','show','destroy']);
Route::resource('bills',BillsController::class)->only(['index','store','update','show','destroy']);
Route::resource('exceptions',ExceptionsController::class)->only(['index','store','update','show','destroy']);