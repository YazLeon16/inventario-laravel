@extends('adminlte::page')

@section('content')

<div class="container">

    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre"
                class="form-control"
                value="{{ $producto->nombre }}">
        </div>

        <div class="mb-3">
            <label>Código</label>
            <input type="text" name="codigo"
                class="form-control"
                value="{{ $producto->codigo }}">
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock"
                class="form-control"
                value="{{ $producto->stock }}">
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01"
                name="precio"
                class="form-control"
                value="{{ $producto->precio }}">
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion"
                class="form-control">{{ $producto->descripcion }}</textarea>
        </div>

        <!-- 🔥 CATEGORÍA -->
        <div class="mb-3">
            <label>Categoría</label>

            <select name="categoria_id" class="form-control">

                <option value="">Seleccione una categoría</option>

                @foreach($categorias as $categoria)

                    <option value="{{ $categoria->id }}"
                        {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>

                        {{ $categoria->nombre }}

                    </option>

                @endforeach

            </select>
        </div>

        <button class="btn btn-primary">
            Actualizar
        </button>

    </form>

</div>

@stop