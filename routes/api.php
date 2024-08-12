<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DivisiController;
use App\Http\Controllers\Api\EmployeeController;
use App\Models\Employee;
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

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('divisions', [DivisiController::class, 'divisi']);
    Route::get('employees', [EmployeeController::class, 'employee']);
    Route::post('employees', [EmployeeController::class, 'create']);
    Route::put('employees/{id}', [EmployeeController::class, 'update']);
    Route::delete('employees/{id}', [EmployeeController::class, 'destroy']);
    Route::post('logout', [AuthController::class, 'logout']);

});
