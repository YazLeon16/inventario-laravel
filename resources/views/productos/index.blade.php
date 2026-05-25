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

        <form action="/productos" method="GET" class="mb-3">

            <div class="row">

                <div class="col-md-4">

                    <input type="text"
                           name="buscar"
                           class="form-control"
                           placeholder="Buscar producto..."
                           value="{{ $buscar }}">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-success">
                        Buscar
                    </button>

                </div>

            </div>

        </form>

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <table class="table table-bordered table-striped">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Acciones</th>
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

                    <td>

                        <a href="{{ route('productos.edit', $producto->id) }}"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('productos.destroy', $producto->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                Eliminar
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <div class="mt-3">
            {{ $productos->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>

@stop