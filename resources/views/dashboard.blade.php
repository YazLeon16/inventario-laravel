@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Inventario</h1>
@stop

@section('content')

<div class="row">

    <!-- TOTAL PRODUCTOS -->
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

    <!-- STOCK BAJO -->
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

    <!-- VALOR INVENTARIO -->
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

<!-- ÚLTIMOS PRODUCTOS -->
<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Últimos Productos
        </h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                </tr>

            </thead>

            <tbody>

                @foreach($ultimosProductos as $producto)

                <tr>

                    <td>{{ $producto->id }}</td>

                    <td>{{ $producto->nombre }}</td>

                    <td>

                        @if($producto->stock <= 5)

                            <span class="badge bg-danger">
                                {{ $producto->stock }}
                            </span>

                        @elseif($producto->stock <= 15)

                            <span class="badge bg-warning">
                                {{ $producto->stock }}
                            </span>

                        @else

                            <span class="badge bg-success">
                                {{ $producto->stock }}
                            </span>

                        @endif

                    </td>

                    <td>${{ $producto->precio }}</td>

                    <td>
                        {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<!-- GRÁFICA -->
<div class="card mt-4">

    <div class="card-header">

        <h3 class="card-title">
            Productos por Categoría
        </h3>

    </div>

    <div style="width: 400px; margin:auto;">

    <canvas id="graficaCategorias"></canvas>

</div>

</div>

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('graficaCategorias');

new Chart(ctx, {

    type: 'doughnut',

    data: {

        labels: [

            @foreach($productosCategoria as $categoria)

                '{{ $categoria->nombre }}',

            @endforeach

        ],

        datasets: [{

            label: 'Productos por Categoría',

            data: [

                @foreach($productosCategoria as $categoria)

                    {{ $categoria->productos_count }},

                @endforeach

            ],
            backgroundColor: [
                '#0d6efd',
                '#ffc107',
                '#dc3545',
                '#6f42c1',
                '#20c997'
            ],

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

@stop