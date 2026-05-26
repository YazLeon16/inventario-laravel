@extends('adminlte::page')

@section('title', 'Nueva Categoría')

@section('content_header')
    <h1>Nueva Categoría</h1>
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

        <form action="/categorias" method="POST">

            @csrf

            <div class="mb-3">

                <label>Nombre</label>

                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ old('nombre') }}">

            </div>

            <div class="mb-3">

                <label>Descripción</label>

                <textarea name="descripcion"
                          class="form-control">{{ old('descripcion') }}</textarea>

            </div>

            <button class="btn btn-success">
                Guardar
            </button>

        </form>

    </div>

</div>

@stop