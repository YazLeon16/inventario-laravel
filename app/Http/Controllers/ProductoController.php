<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', compact('productos'));
    }
    public function create(){
        return view('productos.create');
    }
    public function store(Request $request){
        Producto::create([
            'nombre' => $request->nombre,
            'codigo'=> $request->codigo,
            'stock'=> $request->stock,
            'precio'=>$request->precio,
            'descripcion'=>$request->descripcion,
        ]);
        return redirect('/productos')->with('success', 'Producto guardado correctamente');
    }
}