<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskOutputController;
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


/*
 * Authenticated User login
 * */
Route::post('/login',[EmployeeController::class,'remoteLogin']);
Route::post('/tasks',[TaskController::class,'getUserTasks']);
Route::post('/task/accept',[TaskController::class,'acceptTask']);
Route::post('/task/output',[TaskOutputController::class,'addOutput']);
