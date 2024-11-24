<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fertilizantes;
use Barryvdh\DomPDF\Facade\Pdf;


class ControladorFertilizantes extends Controller
{
    public function fertilizantes(){
        
        return view ('fertilizantes');
    }
}
