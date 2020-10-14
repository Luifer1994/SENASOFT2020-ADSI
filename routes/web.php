<?php

use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->get('/', [UsersController::class, 'index']);


//RUTA DE TIPO RESOURCE QUE CONTIENE TODOS LOS METODOS ALOJADOS EN EL CONTROLADOR DE USERS
Route::middleware(['auth:sanctum', 'verified'])->resource('/user', UsersController::class)
->names('user')->parameters(['user' => 'request']);

//RUTA DE TIPO RESOURCE QUE CONTIENE TODOS LOS METODOS ALOJADOS EN EL CONTROLADOR DE SucursalesController
Route::middleware(['auth:sanctum', 'verified'])->resource('/sucursal', SucursalesController::class)
->names('sucursal')->parameters(['sucursal' => 'request']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
