<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invernaderos;

class ControladorCarrito extends Controller
{
    public function agregar_carrito(Request $request, $id){
        $producto = Invernaderos::find($id);

        if(!$producto){
            return redirect()->back()->with('error', 'El producto no existe');
        }

        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])){
            $carrito[$id] ['cantidad']++;
        } else {
            $carrito[$id] = [
                'tipo' => $producto->tipo,
                'precio' => $producto->precio,
                'cantidad' => 1,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function mostrar(){
        $carrito = session()->get('carrito', []);
        return view('carrito', compact('carrito'));
    }
}
