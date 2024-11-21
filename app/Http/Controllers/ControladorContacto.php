<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ControladorContacto extends Controller
{
    public function contactanos(){
        return view('contactanos');
    }

    public function contacto_enviar(Request $request){
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email',
            'asunto' => 'required|max:255',
            'mensaje' => 'required|min:10',
        ]);

        return redirect()->route('contactanos')->with('success', '¡Gracias por contactarnos! Te responderemos pronto');
    }
}
