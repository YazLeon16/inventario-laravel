@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content_header')
    <h1>Nuevo Producto</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        <form action="/productos" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ old('nombre') }}">
            </div>

            <div class="mb-3">
                <label>Código</label>
                <input type="text"
                       name="codigo"
                       class="form-control"
                       value="{{ old('codigo') }}">
            </div>

            <div class="mb-3">
                <label>Stock</label>
                <input type="number"
                       name="stock"
                       class="form-control"
                       value="{{ old('stock') }}">
            </div>

            <div class="mb-3">
                <label>Precio</label>
                <input type="number"
                       step="0.01"
                       name="precio"
                       class="form-control"
                       value="{{ old('precio') }}">
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion"
                          class="form-control">{{ old('descripcion') }}</textarea>
            </div>

            <!-- 🔥 CATEGORÍA (IMPORTANTE) -->
            <div class="mb-3">
                <label>Categoría</label>

                <select name="categoria_id" class="form-control">
                    <option value="">Seleccione una categoría</option>

                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">
                Guardar
            </button>

        </form>

    </div>

</div>

@stop