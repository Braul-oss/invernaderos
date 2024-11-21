<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> <!-- Agrega tu CSS aquí -->
</head>
<body>
    <div id="encabezado">
        <a href="{{ route('login') }}">
            <img src="{{ asset('img/dino.jpg') }}" alt="Logo Empresa" id="imgenbn">
        </a>
        <nav class="menu">
            <ul>
                <li><a href="{{ route('contactanos') }}">Contáctanos</a></li>
                <li><a href="{{ route('login') }}">Ingresar</a></li>
            </ul>
        </nav>
    </div>

    <div id="cuerpo">
        <center>
            <h2>Formulario de Contacto</h2>

            <form action="{{ route('contacto_enviar') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="asunto">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" class="form-control" value="{{ old('asunto') }}" required>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" class="form-control" rows="4" required>{{ old('mensaje') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </center>
    </div>
</body>
</html>
