@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Lista de Categorías</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <a href="/categorias/create" class="btn btn-primary mb-3">
            Nueva Categoría
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
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach($categorias as $categoria)

                <tr>

                    <td>{{ $categoria->id }}</td>

                    <td>{{ $categoria->nombre }}</td>

                    <td>{{ $categoria->descripcion }}</td>

                    <td>

                        <a href="{{ route('categorias.edit', $categoria->id) }}"
                           class="btn btn-warning btn-sm">

                            Editar

                        </a>

                        <form action="{{ route('categorias.destroy', $categoria->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">

                                Eliminar

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <div class="mt-3">
            {{ $categorias->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>

@stop