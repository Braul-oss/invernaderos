<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ControladorLogin extends Controller
{
    public function login(){

        // Comprobamos si el usuario ya está autenticado
	    if (Auth::check()) {
	
	        // Si está logado le mostramos la vista de logados
	        return $this->redireccionarPorRol(Auth::user()->rol);
	    }
	
	    // Si no está logado le mostramos la vista con el formulario de login
	    return view('login');
    }

    public function login_aceptar(Request $request)
{
    // Validación de las credenciales
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Obtener las credenciales
    $credentials = $request->only('email', 'password');

    // Intentar autenticar
    if (Auth::attempt($credentials)) {
        // Si el usuario tiene el rol de admin, redirigir al panel de administración
        if (Auth::user()->rol == 'admin') {
            return redirect()->route('panel_admin')->with('success', 'Has iniciado sesión como administrador.');
        } else {
            // Si el usuario tiene otro rol, redirigir al panel de usuario
            return redirect()->route('home_user')->with('success', 'Has iniciado sesión como usuario.');
        }
    } else {
        // Si las credenciales no son correctas, mostrar un mensaje de error
        return redirect()->route('login')->withErrors('Las credenciales son incorrectas.');
    }
}

    public function login_alta(){
        return view("login_alta");
    }

    public function login_registrar(Request $request)
{
    // Validaciones
    $this->validate($request, [
        'nombre' => 'required',
        'email' => 'required|email|unique:tb_login,email',
        'password' => 'required|min:8',
        'rpassword' => 'required|same:password',
        'rol' => 'required|in:usuario,admin',  
    ]);

    // Cifrar la contraseña
    $hashedPassword = bcrypt($request->input('password'));

    // Crear el nuevo registro de usuario con la contraseña cifrada
    $user = Login::create([
        'nombre' => $request->input('nombre'),
        'apellido' => $request->input('apellido'),
        'email' => $request->input('email'),
        'password' => $hashedPassword,
        'rol' => $request->input('rol'),  // Asignar el rol
    ]);

    // Autenticar al usuario recién creado
    Auth::login($user);

    // Verificar si el usuario está autenticado y tiene el rol correcto
    if (Auth::check()) {
        
        //dd(Auth::user()->rol);  // Verifica si el rol del usuario es 'admin'

        if (Auth::user()->rol == 'admin') {
            return redirect()->route('panel_admin')->with('success', 'Has iniciado sesión como administrador.');
        } else {
            return redirect()->route('home_user')->with('success', 'Has iniciado sesión como usuario.');
        }
    } else {
        return redirect()->route('login')->withErrors('Error al autenticar el usuario.');
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    private function redireccionarPorRol($role)
    {
        switch ($role){
            case 'admin':
                return redirect()->route('panel_admin');
                case 'usuario':
                    return redirect()->route('herramientas');
                    default:
                    return redirect()->route('herramientas');
        }
    }
}
