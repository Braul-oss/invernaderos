<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invernaderos;
use App\Models\Herramientas;
use App\Models\Plantas;

class ControladorUsuario extends Controller
{
    public function home_user(){
    
        return view('home_user');
    }

    public function productos_invernadero(){
    
        $productos = Invernaderos::all();
        return view('productos_invernadero', compact('productos'));
    }

    public function productos_fertilizante(){
    
        return view('productos_fertilizante');
    }

    public function productos_herramienta(){
    
        $productos = Herramientas::all();
        return view('productos_herramienta', compact('productos'));
    }

    public function productos_planta(){
    
        $productos = Plantas::all();
        return view('productos_planta', compact('productos'));
    }
}
