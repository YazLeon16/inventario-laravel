<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::paginate(5);

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect('/categorias')
            ->with('success', 'Categoría creada correctamente');
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $categoria = Categoria::find($id);

        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect('/categorias')
            ->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        $categoria->delete();

        return redirect('/categorias')
            ->with('success', 'Categoría eliminada correctamente');
    }
}