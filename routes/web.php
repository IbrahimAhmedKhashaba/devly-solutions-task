<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Department\DepartmentController;
use App\Http\Controllers\Dashboard\Employee\EmployeeController;
use App\Http\Controllers\Dashboard\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');

Route::group([
    'prefix' => 'auth',
    'middleware' => 'guest',
    'controller' => AuthController::class
],function () {
    Route::get('login' , 'showLoginForm')->name('login');
    Route::post('login' , 'login')->name('login.post');
});


Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => 'auth',
],function () {
    Route::resource('departments' , DepartmentController::class)
        ->except(['show' , 'create' , 'edit']);
        
    Route::resource('employees' , EmployeeController::class)
        ->except(['show' , 'create' , 'edit']);
    Route::get('/employees/export', [EmployeeController::class, 'export'])
        ->name('employees.export');

    Route::group([
        'prefix' => 'profile',
        'as' => 'profile.',
        'middleware' => 'auth',
        'controller' => ProfileController::class
    ],function () {
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');
        Route::put('/password', 'updatePassword')->name('password');
    });
    Route::post('logout' , [AuthController::class , 'logout'])
        ->name('auth.logout');
});