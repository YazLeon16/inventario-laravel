<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProductos = Producto::count();

        $stockBajo = Producto::where('stock', '<=', 5)->count();

        $valorInventario = Producto::sum('precio');

        $ultimosProductos = Producto::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProductos',
            'stockBajo',
            'valorInventario',
            'ultimosProductos'
        ));
    }
}