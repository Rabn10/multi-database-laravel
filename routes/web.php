<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

//route for registration
Route::get('/register', [UserController::class, 'registerPage'])->name('register');
Route::post('/register', [UserController::class, 'store']);

//route for login
Route::get('/login', [UserController::class, 'loginPage'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//dashboard routes
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/edit/{id}', [EmployeeController::class, 'getOneEmployee'])->name('edit');
Route::post('/update/{id}', [EmployeeController::class, 'updateEmployee'])->name('update');
Route::post('/store', [EmployeeController::class, 'store']);
Route::get('/delete_employee/{id}', [EmployeeController::class, 'deleteEmployee']);


