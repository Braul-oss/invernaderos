<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Detalle invernadero</title>
        

        <body>
<h1>Detalles del invernadero</h1>
<center>
    <p><strong>ID:</strong> {{ $invernadero->id_invernadero }}</p>
    <p><strong>Tipo:</strong> {{ $invernadero->tipo }}</p>
    <p><strong>Descripción:</strong> {{ $invernadero->descripcion }}</p>
    <p><strong>Precio:</strong> {{ $invernadero->precio }}</p>
    <p><strong>Imagen:</strong></p>
    <img src="{{ url('img/'.$invernadero->imagen) }}" alt="Imagen del invernadero" style="width: 150px;">
    <hr>
    <a href="{{ route('invernadero') }}">
<button type="button" class="btn btn-danger">Regresar</button>
</a>
    </center>
    </body>
    </html>
