<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorProductos extends Controller
{
    public function productos(){
        
        return view ('productos');
    }
}
