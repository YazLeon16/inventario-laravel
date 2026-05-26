@extends('adminlte::page')

@section('title', 'Nuevo Movimiento')

@section('content_header')
    <h1>Registrar Movimiento</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        @if(session('error'))

            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

        @endif

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('movimientos.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label>Producto</label>

                <select name="producto_id" class="form-control">

                    <option value="">
                        Selecciona un producto
                    </option>

                    @foreach($productos as $producto)

                        <option value="{{ $producto->id }}">

                            {{ $producto->nombre }}
                            - Stock: {{ $producto->stock }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Tipo de Movimiento</label>

                <select name="tipo" class="form-control">

                    <option value="entrada">
                        Entrada
                    </option>

                    <option value="salida">
                        Salida
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label>Cantidad</label>

                <input type="number"
                       name="cantidad"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Descripción</label>

                <textarea name="descripcion"
                          class="form-control"></textarea>

            </div>

            <button class="btn btn-success">

                Guardar Movimiento

            </button>

        </form>

    </div>

</div>

@stop