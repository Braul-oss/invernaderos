<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
        <title>Editar herramienta</title>
        

        <body>
        <h1>Editar Herramienta</h1>
        <center>
<form action="{{ route('herramienta_actualizar', $herramientas->id_herramienta) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $herramientas->nombre) }}" required>
    </div>
    <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" required>{{ $herramientas->descripcion }}</textarea>
            </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="{{ old('precio', $herramientas->precio) }}" required>
    </div>
    <div>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="{{ old('stock', $herramientas->stock) }}" required>
    </div>
    <div>
        <label for="floatingimagen">Imagen:</label>
        <input type="file" name="imagen">
        <img src="{{ asset('storage_path/'.$herramientas->imagen) }}" style="width: 30px; height: 30px;">
    </div>
    <button type="submit">Actualizar</button>
    <a href="{{ route('herramientas') }}">
<button type="button" class="btn btn-danger">Cancelar</button>
</a>
</form>
</center>
</body>
</html>

