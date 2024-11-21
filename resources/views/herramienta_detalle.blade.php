<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Detalle herramienta</title>
        

        <body>
<h1>Detalles de la herramienta</h1>
<center>
    <p><strong>ID:</strong> {{ $herramientas->id_herramienta }}</p>
    <p><strong>Nombre:</strong> {{ $herramientas->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $herramientas->descripcion }}</p>
    <p><strong>Precio:</strong> {{ $herramientas->precio }}</p>
    <p><strong>Stock:</strong> {{ $herramientas->stock }}</p>
    <p><strong>Imagen:</strong></p>
    <img src="{{ url('img/'.$herramientas->imagen) }}" alt="Imagen de la herramienta" style="width: 150px;">
    <hr>
    <a href="{{ route('herramientas') }}">
<button type="button" class="btn btn-danger">Regresar</button>
</a>
    </center>
    </body>
    </html>
