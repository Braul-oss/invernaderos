<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorUsuario extends Controller
{
    public function home_user(){
    
        return view('home_user');
    }

    public function productos_invernadero(){
    
        return view('productos_invernadero');
    }

    public function productos_fertilizante(){
    
        return view('productos_fertilizante');
    }

    public function productos_herramienta(){
    
        return view('productos_herramienta');
    }

    public function productos_planta(){
    
        return view('productos_planta');
    }
}
