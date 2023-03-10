<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\api\AuthController;
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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('employees', EmployeeController::class);
    });
//Route::apiResource('titles', TitleController::class);
// Route::apiResource('employees', EmployeeController::class);
// Route::apiResource('salaries', SalaryController::class);
