<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

Route::get('/productos/pdf', [ProductoController::class, 'exportPdf'])
    ->name('productos.pdf');

Route::get(
    '/productos/excel',
    [ProductoController::class, 'exportExcel']
)->name('productos.excel');

Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class);

/*Route::get('/productos/{id}/edit',[ProductoController::class, 'edit'])->name(' productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');*/

use App\Http\Controllers\MovimientoController;

Route::get('/movimientos', [MovimientoController::class, 'index'])
    ->name('movimientos.index');

Route::get('/movimientos/create', [MovimientoController::class, 'create'])
    ->name('movimientos.create');

Route::post('/movimientos', [MovimientoController::class, 'store'])
    ->name('movimientos.store');

Route::get('/productos/{id}/kardex',
    [ProductoController::class, 'kardex'])
    ->name('productos.kardex');