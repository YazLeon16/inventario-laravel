<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    $totalProductos = Producto::count();

    $stockBajo = Producto::where('stock', '<=', 5)->count();

    $valorInventario = Producto::sum(DB::raw('stock * precio'));

    $ultimosProductos = Producto::latest()->take(5)->get();

    // 🔥 PRODUCTOS POR CATEGORÍA
    $productosCategoria = Categoria::withCount('productos')->get();

    return view('dashboard', compact(
        'totalProductos',
        'stockBajo',
        'valorInventario',
        'ultimosProductos',
        'productosCategoria'
    ));
}
}