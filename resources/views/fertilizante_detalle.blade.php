<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Detalle fertilizante</title>
        

        <body>
<h1>Detalles del fertilizante</h1>
<center>
    <p><strong>ID:</strong> {{ $fertilizante->id_fertilizante }}</p>
    <p><strong>Nombre:</strong> {{ $fertilizante->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $fertilizante->descripcion }}</p>
    <p><strong>Precio:</strong> {{ $fertilizante->precio }}</p>
    <p><strong>Stock:</strong> {{ $fertilizante->stock }}</p>
    <p><strong>Imagen:</strong></p>
    <img src="{{ url('img/'.$fertilizante->imagen) }}" alt="Imagen del fertilizante" style="width: 150px;">
    <hr>
    <a href="{{ route('fertilizantes') }}">
<button type="button" class="btn btn-danger">Regresar</button>
</a>
    </center>
    </body>
    </html>
