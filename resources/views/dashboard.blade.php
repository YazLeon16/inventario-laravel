@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Inventario</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-4 col-6">

        <div class="small-box bg-info">

            <div class="inner">
                <h3>{{ $totalProductos }}</h3>
                <p>Total Productos</p>
            </div>

            <div class="icon">
                <i class="fas fa-box"></i>
            </div>

        </div>

    </div>

    <div class="col-lg-4 col-6">

        <div class="small-box bg-warning">

            <div class="inner">
                <h3>{{ $stockBajo }}</h3>
                <p>Productos con Stock Bajo</p>
            </div>

            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>

        </div>

    </div>

    <div class="col-lg-4 col-6">

        <div class="small-box bg-success">

            <div class="inner">
                <h3>${{ $valorInventario }}</h3>
                <p>Valor Total Inventario</p>
            </div>

            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Últimos Productos</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                </tr>
            </thead>

            <tbody>

                @foreach($ultimosProductos as $producto)

                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>${{ $producto->precio }}</td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@stop