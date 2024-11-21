<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorFertilizantes extends Controller
{
    public function fertilizantes(){
        
        return view ('fertilizantes');
    }
}
