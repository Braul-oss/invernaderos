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
                <h1>Nuevo Registro de Planta</h1>
                <hr>
                <center>
                <form action="{{ route('planta_registrar') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3>Datos de la planta</h3>

                    <div class="form-floating mb-3">
                        <label for="floatingNombre">Nombre</label>
                        <input type="input" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingNombre"
                        placeholder="ejemplo: Buganvilla" aria-describedby="NombreHelp">
                        <div id="NombreHelp" class="form-text">@if($errors->first('nombre')) <i>El campo Nombre(s) no es correcto !!!</i> @endif</div>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingTipo">Tipo</label>
                        <input type="input" class="form-control" name="tipo" value="{{ old('tipo') }}" id="floatingTipo"
                        placeholder="ejemplo: Arbusto trepador o enredadera" aria-describedby="TipoHelp">
                        <div id="TipoHelp" class="form-text">@if($errors->first('tipo')) <i>El campo Tipo no es correcto !!!</i> @endif</div>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingDescripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" id="floatingDescripcion"
                        placeholder="Descripción de la planta" aria-describedby="DescripcionHelp">{{ old('descripcion') }}</textarea>
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
                        <label for="floatingStock">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ old('stock') }}" id="floatingStock">
                        <div id="StockHelp" class="form-text">@if($errors->first('stock')) <i>El campo Stock no es correcto !!!</i> @endif</div>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingfoto">Foto</label>
                        <input type="file" class="form-control" name="foto" id="floatingfoto"
                        placeholder="- - - -" aria-describedby="fotoHelp">
                        <div id="fotoHelp" class="form-text">Busque una Imagen para su perfil (<i>Formatos</i>: jpg/png/bmp)</div>
                    </div>

<hr><br>

<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ route('planta') }}">
<button type="button" class="btn btn-danger">Cancelar</button>
</a>
</form>
</center>
<br>
</div>
</body>
</html>
