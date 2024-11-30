<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invernaderos;
use App\Models\Fertilizantes;
use App\Models\Plantas;
use App\Models\Herramientas;

class ControladorProductos extends Controller
{
    public function productos(){
        
        $fertilizantes = Fertilizantes::all();
        $invernaderos = Invernaderos::all();
        $plantas = Plantas::all();
        $herramientas = Herramientas::all();

        return view('productos', compact('fertilizantes', 'invernaderos', 'plantas', 'herramientas'));
    }
}
