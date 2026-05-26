@extends('adminlte::page')

@section('title', 'Movimientos')

@section('content_header')
    <h1>Historial de Movimientos</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <a href="{{ route('movimientos.create') }}"
           class="btn btn-primary mb-3">

            Nuevo Movimiento

        </a>

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Producto</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Fecha</th>

                </tr>

            </thead>

            <tbody>

                @foreach($movimientos as $movimiento)

                <tr>

                    <td>{{ $movimiento->id }}</td>

                    <td>
                        {{ $movimiento->producto->nombre }}
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

                @endforeach

            </tbody>

        </table>

        <div class="mt-3">

            {{ $movimientos->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@stop