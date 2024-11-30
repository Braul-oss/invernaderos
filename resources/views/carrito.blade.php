<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>
<body>
<div id="encabezado">
<a href="{{ route('home_user') }}">
        <img src="{{ 'img/dino.jpg' }}" alt="logo empresa" id="imgenbn">
        </a>
    <nav class="menu">
      <ul>
        <li><h1 class="text-center">Carrito de compras</h1></li>
      </ul>
    </nav>
  </div>
  <hr>
    <table>
        <thead>
            <tr>
                <th>Tipo de Producto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($carrito as $key => $producto)
        <tr>
            <td>{{ ucfirst($producto['tipo_producto']) }}</td>
            <td>{{ $producto['nombre'] }}</td>
            <td>${{ $producto['precio'] }}</td>
            <td>
                @if (in_array($producto['tipo_producto'], ['planta', 'herramienta', 'fertilizante']))
                    <form action="{{ route('actualizar_carrito', $key) }}" method="POST">
                        @csrf
                        <input type="number" name="cantidad" value="{{ $producto['cantidad'] }}" min="1" max="{{ $producto['stock'] }}" style="width: 60px;">
                        <button type="submit" class="boton">Actualizar</button>
                    </form>
                @else
                    {{ $producto['cantidad'] }}
                @endif
            </td>
            <td>${{ $producto['precio'] * $producto['cantidad'] }}</td>
            <td>
                <form action="{{ route('eliminar_carrito', $key) }}" method="POST">
                    @csrf
                    <button type="submit" class="boton">Eliminar</button>
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
    <a href="{{ route('home_user') }}" class="boton">Volver</a>
    <br><br>
    <div>
    <form action="{{ route('pagar_carrito') }}" method="POST">
        @csrf
        <button type="submit" class="boton">Generar Pago</button>
    </form>
</div>
</body>
</html>