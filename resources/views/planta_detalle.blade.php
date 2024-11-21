<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Detalle Planta</title>
        

        <body>
<h1>Detalles de la Planta</h1>
<center>
    <p><strong>ID:</strong> {{ $planta->id_planta }}</p>
    <p><strong>Nombre:</strong> {{ $planta->nombre }}</p>
    <p><strong>Tipo:</strong> {{ $planta->tipo }}</p>
    <p><strong>Descripción:</strong> {{ $planta->descripcion }}</p>
    <p><strong>Precio:</strong> {{ $planta->precio }}</p>
    <p><strong>Stock:</strong> {{ $planta->stock }}</p>
    <p><strong>Imagen:</strong></p>
    <img src="{{ url('img/'.$planta->imagen) }}" alt="Imagen de la planta" style="width: 150px;">
    <hr>
    <a href="{{ route('planta') }}">
<button type="button" class="btn btn-danger">Regresar</button>
</a>
    </center>
    </body>
    </html>
