<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorServicios extends Controller
{
    public function servicios(){
        
        return view ('servicios');
    }
}
