@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <a href="/productos/create" class="btn btn-primary mb-3">
            Nuevo Producto
        </a>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Stock</th>
                    <th>Precio</th>
                </tr>
            </thead>

            <tbody>

                @foreach($productos as $producto)

                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>${{ $producto->precio }}</td>
                </tr>

                @endforeach

            </tbody>
        </table>

    </div>
</div>

@stop