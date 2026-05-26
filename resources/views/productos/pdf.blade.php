<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>Reporte Productos</title>

    <style>

        body{
            font-family: Arial, sans-serif;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 8px;
            text-align: center;
        }

        th{
            background-color: #f2f2f2;
        }

    </style>

</head>

<body>

    <h2>Reporte de Productos</h2>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Categoría</th>
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
                <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>