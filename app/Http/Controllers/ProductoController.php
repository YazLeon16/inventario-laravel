<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $productos = Producto::where('nombre', 'LIKE', "%{$buscar}%")
            ->orWhere('codigo', 'LIKE', "%{$buscar}%")
            ->paginate(5);

        return view('productos.index', compact('productos', 'buscar'));
    }
    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:productos',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required',
        ]);
        Producto::create([
            'nombre' => $request->nombre,
            'codigo'=> $request->codigo,
            'stock'=> $request->stock,
            'precio'=>$request->precio,
            'descripcion'=>$request->descripcion,
        ]);
        return redirect('/productos')->with('success', 'Producto guardado correctamente');
    }
    public function edit($id){

    $producto = Producto::find($id);

    return view('productos.edit', compact('producto'));
    }
    public function update(Request $request, $id){

    $request->validate([
        'nombre' => 'required',
        'codigo' => 'required|unique:productos,codigo,'.$id,
        'stock' => 'required|integer|min:0',
        'precio' => 'required|numeric|min:0',
        'descripcion' => 'required',
    ]);

    $producto = Producto::find($id);

    $producto->update([
        'nombre' => $request->nombre,
        'codigo'=> $request->codigo,
        'stock'=> $request->stock,
        'precio'=> $request->precio,
        'descripcion'=> $request->descripcion,
    ]);

    return redirect('/productos')
        ->with('success', 'Producto actualizado correctamente');
    }
    public function destroy($id)
    {
        $producto = Producto::find($id);

        $producto->delete();

        return redirect('/productos')
            ->with('success', 'Producto eliminado correctamente');
    }
}