<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);

use App\Http\Controllers\ProductoController;

Route::resource('productos', ProductoController::class);