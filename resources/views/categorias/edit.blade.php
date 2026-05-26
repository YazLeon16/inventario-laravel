@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('categorias.update', $categoria->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nombre</label>

                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ $categoria->nombre }}">

            </div>

            <div class="mb-3">

                <label>Descripción</label>

                <textarea name="descripcion"
                          class="form-control">{{ $categoria->descripcion }}</textarea>

            </div>

            <button class="btn btn-primary">
                Actualizar
            </button>

        </form>

    </div>

</div>

@stop