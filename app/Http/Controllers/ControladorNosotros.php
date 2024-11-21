<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorNosotros extends Controller
{
    public function nosotros(){
        return view ('nosotros');
    }
}
