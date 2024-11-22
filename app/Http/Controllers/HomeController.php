<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        return view('home');
    }

    public function invernadero_validar(){
        //dd(auth()->check());
        if (auth()->check()){
            return redirect()->route('productos_invernadero');
        } else {
            return redirect()->route('login');
        }
    }

    public function fertilizante_validar(){
        //dd(auth()->check());
        if (auth()->check()){
            return redirect()->route('productos_fertilizante');
        } else {
            return redirect()->route('login');
        }
    }

    public function herramienta_validar(){
        //dd(auth()->check());
        if (auth()->check()){
            return redirect()->route('productos_herramienta');
        } else {
            return redirect()->route('login');
        }
    }

    public function planta_validar(){
        //dd(auth()->check());
        if (auth()->check()){
            return redirect()->route('productos_planta');
        } else {
            return redirect()->route('login');
        }
    }
}
