<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductosExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
    public function index(Request $request)
{
    $buscar = $request->buscar;
    $categoria = $request->categoria;

    $categorias = Categoria::all();

    $productos = Producto::query()

        ->when($buscar, function ($query, $buscar) {
            $query->where('nombre', 'LIKE', "%{$buscar}%")
                  ->orWhere('codigo', 'LIKE', "%{$buscar}%");
        })

        ->when($categoria, function ($query, $categoria) {
            $query->where('categoria_id', $categoria);
        })

        ->paginate(5);

    return view('productos.index', compact(
        'productos',
        'buscar',
        'categorias',
        'categoria'
    ));
}

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:productos',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required',
            'categoria_id' => 'required'
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'stock' => $request->stock,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect('/productos')
            ->with('success', 'Producto guardado correctamente');
    }
    public function exportPdf()
    {
        $productos = Producto::all();

        $pdf = Pdf::loadView('productos.pdf', compact('productos'));

        return $pdf->download('productos.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(
            new ProductosExport,
            'productos.xlsx'
        );
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();

        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:productos,codigo,' . $id,
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required',
            'categoria_id' => 'required'
        ]);

        $producto = Producto::find($id);

        $producto->update([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'stock' => $request->stock,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id
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
    public function kardex($id)
    {
        $producto = Producto::findOrFail($id);

        $movimientos = $producto->movimientos()
            ->latest()
            ->get();

        return view('productos.kardex', compact(
            'producto',
            'movimientos'
        ));
    }
}