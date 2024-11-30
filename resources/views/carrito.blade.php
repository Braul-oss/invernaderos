<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .quantity-input {
            width: 60px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Carrito de Compras</h1>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($carrito as $id => $producto)
                <tr>
                    <td>{{ $producto['tipo'] }}</td>
                    <td>${{ $producto['precio'] }}</td>
                    <td>
                        <form action="{{ route('actualizar_carrito', ['id' => $id]) }}" method="POST">
                            @csrf
                            <input type="number" 
                                   name="cantidad" 
                                   value="{{ $producto['cantidad'] }}" 
                                   min="1" 
                                   max="{{ $producto['stock'] }}" 
                                   class="quantity-input">
                            <button type="submit" class="btn">Actualizar</button>
                        </form>
                    </td>
                    <td>${{ $producto['precio'] * $producto['cantidad'] }}</td>
                    <td>
                        <form action="{{ route('eliminar_carrito', ['id' => $id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay productos en el carrito.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>