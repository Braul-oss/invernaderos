<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Ticket de Pago</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrito as $producto)
                <tr>
                    <td>{{ ucfirst($producto['tipo_producto']) }} - {{ $producto['nombre'] }}</td>
                    <td>${{ $producto['precio'] }}</td>
                    <td>{{ $producto['cantidad'] }}</td>
                    <td>${{ $producto['precio'] * $producto['cantidad'] }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="total">Total:</td>
                <td>${{ $total }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
