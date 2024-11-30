<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invernaderos;

class ControladorCarrito extends Controller
{
    public function agregar_carrito($id)
{
    $producto = Invernaderos::find($id);

    if (!$producto) {
        return redirect()->back()->with('error', 'El producto no existe');
    }

    $carrito = session()->get('carrito', []);

    if (isset($carrito[$id])) {
        $carrito[$id]['cantidad']++;
    } else {
        $carrito[$id] = [
            'tipo' => $producto->tipo,
            'precio' => $producto->precio,
            'cantidad' => 1,
        ];
    }

    //session()->put('carrito', $carrito);
    //dd(session()->get('carrito'));

    return redirect()->route('carrito')->with('success', 'Producto agregado al carrito');
}

public function carrito()
{
    $carrito = session()->get('carrito', []);
    return view('carrito', compact('carrito'));
}

public function actualizar_carrito(Request $request, $id)
{
    $carrito = session()->get('carrito', []);

    if (isset($carrito[$id])) {
        $carrito[$id]['cantidad'] = min($request->input('cantidad'), $carrito[$id]['stock']);
        session()->put('carrito', $carrito);
    }

    return redirect()->route('carrito')->with('success', 'Cantidad actualizada.');
}

public function eliminar_carrito($id)
{
    $carrito = session()->get('carrito', []);

    if (isset($carrito[$id])) {
        unset($carrito[$id]);
        session()->put('carrito', $carrito);
    }

    return redirect()->route('carrito')->with('success', 'Producto eliminado del carrito.');
}

}
