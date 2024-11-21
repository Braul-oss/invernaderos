<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Document</title>
        <link rel="stylesheet" href=" {{ asset('css/estilos.css') }}">
    
    </head>

        <body>
            <div class="container">
                <h1>Nuevo Registro de Invernadero</h1>
                <hr>
                <br>
                <center>
                <form action="{{ route('invernadero_registrar') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3>Datos del invernadero</h3>

                    <div class="form-floating mb-3">
                        <label for="floatingTipo">Tipo</label>
                        <input type="input" class="form-control" name="tipo" value="{{ old('tipo') }}" id="floatingTipo"
                        placeholder="ejemplo: Invernadero túnel" aria-describedby="TipoHelp">
                        <div id="TipoHelp" class="form-text">@if($errors->first('tipo')) <i>El campo Tipo no es correcto !!!</i> @endif</div>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingDescripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" id="floatingDescripcion"
                        placeholder="Descripción del invernadero" aria-describedby="DescripcionHelp">{{ old('descripcion') }}</textarea>
                        <div id="DescripcionHelp" class="form-text">
                         @if ($errors->first('descripcion'))
                        <i>El campo descripción no es correcto!</i>
                        @endif
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingPrecio">Precio</label>
                        <input type="number" class="form-control" name="precio" value="{{ old('precio') }}" id="floatingPrecio"
                        placeholder="ejemplo: $300" aria-describedby="PrecioHelp">
                        <div id="PrecioHelp" class="form-text">@if($errors->first('precio')) <i>El campo Precio no es correcto !!!</i> @endif</div>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingfoto">Foto</label>
                        <input type="file" class="form-control" name="foto" id="floatingfoto"
                        placeholder="- - - -" aria-describedby="fotoHelp">
                        <div id="fotoHelp" class="form-text">Busque una Imagen para su perfil (<i>Formatos</i>: jpg/png/bmp)</div>
                    </div>

<hr><br>

<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ route('invernadero') }}">
<button type="button" class="btn btn-danger">Cancelar</button>
</a>
</form>
</center>

<br><br><br>
</div>
</body>
</html>

