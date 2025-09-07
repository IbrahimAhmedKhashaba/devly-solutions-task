<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Dashboard\DashboardController;
use App\Http\Controllers\Api\Department\DepartmentController;
use App\Http\Controllers\Api\Employee\EmployeeController;
use App\Http\Controllers\Api\Profile\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('auth/')->group(function () {
    Route::middleware('guest:sanctum')->post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('departments' , DepartmentController::class);
    Route::apiResource('employees' , EmployeeController::class);
    Route::get('file/employees/export' , [EmployeeController::class , 'export']);
    Route::get('dashboard' , DashboardController::class);
    Route::group([
        'prefix' => 'profile',
        'controller' => ProfileController::class
    ],function () {
        Route::get('/', 'index');
        Route::put('/', 'update');
        Route::put('/password', 'updatePassword');
    });
});