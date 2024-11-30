<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>
<body>
<body>
<div id="encabezado">
<a href="{{ route('home_user') }}">
        <img src="{{ 'img/dino.jpg' }}" alt="logo empresa" id="imgenbn">
        </a>
    <nav class="menu">
      <ul>
        <li>
          <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="cierre">Cerrar sesión</button>
          </form>
        </li>  
        <li><a href="#">Bienvenido:</a></li>
      </ul>
    </nav>
  </div>

<br>
<h1>Productos</h1>
<hr>
    
<div class="container">
    <div class="row">
    @foreach($productos as $producto)
    <div class="col-md-4">
        <div class="card">
            <img src="{{ url('img/'.$producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
            <div class="card-body">
                <h5 class="card-title">{{ $producto->nombre }}</h5>
                <p class="card-text">{{ $producto->descripcion }}</p>
                <p class="card-text">Precio: ${{ $producto->precio }}</p>
                <form action="{{ route('agregar_carrito', $producto->id_herramienta) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Agregar al carrito
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</div>

</body>
</html>


