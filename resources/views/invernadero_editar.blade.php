<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Editar invernadero</title>
        

        <body>
        <h1>Editar Invernadero</h1>
        <center>
<form action="{{ route('invernadero_actualizar', $invernadero->id_invernadero) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo', $invernadero->tipo) }}" required>
    </div>
    <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" required>{{ $invernadero->descripcion }}</textarea>
            </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="{{ old('precio', $invernadero->precio) }}" required>
    </div>
    <div>
        <label for="floatingimagen">Imagen:</label>
        <input type="file" name="imagen">
        <img src="{{ asset('storage_path/'.$invernadero->imagen) }}" style="width: 30px; height: 30px;">
    </div>
    <button type="submit">Actualizar</button>
    <a href="{{ route('invernadero') }}">
<button type="button" class="btn btn-danger">Cancelar</button>
</a>
</form>
</center>
</body>
</html>
