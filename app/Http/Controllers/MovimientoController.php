<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with('producto')
            ->latest()
            ->paginate(10);

        return view('movimientos.index', compact('movimientos'));
    }

    public function create()
    {
        $productos = Producto::all();

        return view('movimientos.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'tipo' => 'required',
            'cantidad' => 'required|integer|min:1',
            'descripcion' => 'nullable'
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        if ($request->tipo == 'entrada') {

            $producto->stock += $request->cantidad;

        } else {

            if ($producto->stock < $request->cantidad) {

                return back()
                    ->with('error', 'Stock insuficiente');
            }

            $producto->stock -= $request->cantidad;
        }

        $producto->save();

        Movimiento::create([
            'producto_id' => $request->producto_id,
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'descripcion' => $request->descripcion
        ]);

        return redirect()
            ->route('movimientos.index')
            ->with('success', 'Movimiento registrado');
    }
}