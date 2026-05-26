@extends('adminlte::page')

@section('title', 'Kardex')

@section('content_header')

    <h1>

        Kardex:
        {{ $producto->nombre }}

    </h1>

@stop

@section('content')

<div class="row">

    <div class="col-md-4">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>
                    {{ $producto->stock }}
                </h3>

                <p>
                    Stock Actual
                </p>

            </div>

            <div class="icon">

                <i class="fas fa-boxes"></i>

            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Historial de Movimientos

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Fecha</th>

                </tr>

            </thead>

            <tbody>

                @forelse($movimientos as $movimiento)

                <tr>

                    <td>
                        {{ $movimiento->id }}
                    </td>

                    <td>

                        @if($movimiento->tipo == 'entrada')

                            <span class="badge bg-success">

                                Entrada

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Salida

                            </span>

                        @endif

                    </td>

                    <td>

                        {{ $movimiento->cantidad }}

                    </td>

                    <td>

                        {{ $movimiento->descripcion }}

                    </td>

                    <td>

                        {{ $movimiento->created_at }}

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center">

                        No hay movimientos

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop