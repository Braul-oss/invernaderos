<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invernaderos;

class ControladorProductos extends Controller
{
    public function productos(){
        
        return view ('productos');
    }
}
