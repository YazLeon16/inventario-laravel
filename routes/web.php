<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);

use App\Http\Controllers\ProductoController;

Route::resource('productos', ProductoController::class);

/*Route::get('/productos/{id}/edit',[ProductoController::class, 'edit'])->name(' productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');*/
