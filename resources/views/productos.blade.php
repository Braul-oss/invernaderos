<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>
<body>
<div id="encabezado">
<a href="{{ route('home_user') }}">
        <img src="{{ 'img/dino.jpg' }}" alt="logo empresa" id="imgenbn">
        </a>
    <nav class="menu">
      <ul>
        <li><h1 class="text-center">Nuestros Productos</h1></li>
      </ul>
    </nav>
  </div>

<br>
<div class="container my-4">
    
    
    <!-- Fertilizantes -->
    <h2 class="mt-4">Fertilizantes</h2>
    <div class="row">
        @forelse($fertilizantes as $fertilizante)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ url('img/'.$fertilizante->imagen) }}" class="card-img-top" alt="{{ $fertilizante->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $fertilizante->nombre }}</h5>
                        <p class="card-text">{{ $fertilizante->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $fertilizante->precio }}</p>
                        <a href="{{ route('login') }}" class="boton">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay fertilizantes disponibles.</p>
        @endforelse
    </div>

    <!-- Invernaderos -->
    <h2 class="mt-4">Invernaderos</h2>
    <div class="row">
        @forelse($invernaderos as $invernadero)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ url('img/'.$invernadero->imagen) }}" class="card-img-top" alt="{{ $invernadero->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $invernadero->nombre }}</h5>
                        <p class="card-text">{{ $invernadero->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $invernadero->precio }}</p>
                        <a href="{{ route('login') }}" class="boton">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay invernaderos disponibles.</p>
        @endforelse
    </div>

    <!-- Plantas -->
    <h2 class="mt-4">Plantas</h2>
    <div class="row">
        @forelse($plantas as $planta)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ url('img/'.$planta->imagen) }}" class="card-img-top" alt="{{ $planta->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $planta->nombre }}</h5>
                        <p class="card-text">{{ $planta->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $planta->precio }}</p>
                        <a href="{{ route('login') }}" class="boton">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay plantas disponibles.</p>
        @endforelse
    </div>

    <!-- Herramientas -->
    <h2 class="mt-4">Herramientas</h2>
    <div class="row">
        @forelse($herramientas as $herramienta)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ url('img/'.$herramienta->imagen) }}" class="card-img-top" alt="{{ $herramienta->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $herramienta->nombre }}</h5>
                        <p class="card-text">{{ $herramienta->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $herramienta->precio }}</p>
                        <a href="{{ route('login') }}" class="boton">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay herramientas disponibles.</p>
        @endforelse
    </div>
</div>
</body>
</html>