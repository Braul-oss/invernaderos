<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invernaderos;
use App\Models\Fertilizantes;
use App\Models\Plantas;
use App\Models\Herramientas;
use Barryvdh\DomPDF\Facade\Pdf;

class ControladorCarrito extends Controller
{
    public function agregar_carrito($tipo, $id)
{
    // Determina el modelo a utilizar según el tipo
    $modelClass = match ($tipo) {
        'invernadero' => \App\Models\Invernaderos::class,
        'fertilizante' => \App\Models\Fertilizantes::class,
        'planta' => \App\Models\Plantas::class,
        'herramienta' => \App\Models\Herramientas::class,
        default => null,
    };

    if (!$modelClass) {
        return redirect()->back()->with('error', 'Tipo de producto inválido.');
    }

    // Busca el producto en el modelo correspondiente
    $producto = $modelClass::find($id);

    if (!$producto) {
        return redirect()->back()->with('error', 'El producto no existe.');
    }

    // Obtén el carrito de la sesión
    $carrito = session()->get('carrito', []);

    // Crea una clave única basada en el tipo y el ID
    $key = $tipo . '_' . $id;

    // Agrega o actualiza el producto en el carrito
    if (isset($carrito[$key])) {
        $carrito[$key]['cantidad']++;
    } else {
        $carrito[$key] = [
            'tipo_producto' => $tipo,
            'nombre' => $producto->tipo ?? $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => 1,
            'stock' => $producto->stock ?? 0, 
        ];
    }

    // Guarda el carrito en la sesión
    session()->put('carrito', $carrito);

    return redirect()->route('carrito')->with('success', 'Producto agregado al carrito.');
}

public function carrito()
{
    $carrito = session()->get('carrito', []);
   // dd($carrito);
    return view('carrito', compact('carrito'));
}

public function actualizar_carrito(Request $request, $key)
{
    $carrito = session()->get('carrito', []);

    if (!isset($carrito[$key])) {
        return redirect()->route('carrito')->with('error', 'El producto no existe en el carrito.');
    }

    // Validar la nueva cantidad
    $nuevaCantidad = $request->input('cantidad');
    if ($nuevaCantidad <= 0) {
        return redirect()->route('carrito')->with('error', 'La cantidad debe ser mayor a 0.');
    }

    if ($nuevaCantidad > $carrito[$key]['stock']) {
        return redirect()->route('carrito')->with('error', 'Cantidad supera el stock disponible.');
    }

    // Actualizar la cantidad
    $carrito[$key]['cantidad'] = $nuevaCantidad;
    session()->put('carrito', $carrito);

    return redirect()->route('carrito')->with('success', 'Cantidad actualizada correctamente.');
}

public function eliminar_carrito($key)
{
    $carrito = session()->get('carrito', []);

    if (!isset($carrito[$key])) {
        return redirect()->route('carrito')->with('error', 'El producto no existe en el carrito.');
    }

    // Eliminar el producto del carrito
    unset($carrito[$key]);
    session()->put('carrito', $carrito);

    return redirect()->route('carrito')->with('success', 'Producto eliminado del carrito.');
}

public function pagar_carrito()
{
    $carrito = session()->get('carrito', []);

    if (empty($carrito)) {
        return redirect()->route('carrito')->with('error', 'El carrito está vacío.');
    }

    // Calcular el total
    $total = array_reduce($carrito, function ($carry, $producto) {
        return $carry + ($producto['precio'] * $producto['cantidad']);
    }, 0);

    // Generar el ticket 
    $pdf = Pdf::loadView('pagar_carrito', compact('carrito', 'total'));

    // Descargar el ticket como PDF
    return $pdf->download('ticket.pdf');
}

}
