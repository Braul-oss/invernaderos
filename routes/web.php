<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ControladorFertilizantes;
use App\Http\Controllers\ControladorHerramientas;
use App\Http\Controllers\ControladorInvernaderos;
use App\Http\Controllers\ControladorNosotros;
use App\Http\Controllers\ControladorPlantas;
use App\Http\Controllers\ControladorProductos;
use App\Http\Controllers\ControladorServicios;
use App\Http\Controllers\ControladorLogin;
use App\Http\Controllers\ControladorPersonal;
use App\Http\Controllers\ControladorUsuario;
use App\Http\Controllers\ControladorPanel;
use App\Http\Controllers\ControladorContacto;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//------------------------------------------------------------------------------------------------------------
Route::get('/', function () {return view('home');})->middleware('auth');
Route::name('home')->get('/home',[HomeController::class, 'home']);
Route::name('home_user')->get('/home_user',[ControladorUsuario::class, 'home_user'])->middleware('auth');
Route::name('productos')->get('/productos',[ControladorProductos::class, 'productos']);
Route::name('fertilizantes')->get('/fertilizantes',[ControladorFertilizantes::class, 'fertilizantes']);
Route::name('herramientas')->get('/herramientas',[ControladorHerramientas::class, 'herramientas']);
Route::name('invernadero')->get('/invernadero',[ControladorInvernaderos::class, 'invernadero']);
Route::name('nosotros')->get('/nosotros',[ControladorNosotros::class, 'nosotros']);
Route::name('planta')->get('/planta',[ControladorPlantas::class, 'planta']);
Route::name('servicios')->get('/servicios',[ControladorServicios::class, 'servicios']);

Route::name('login')->get('/login',[ControladorLogin::class, 'login']);
Route::name('login_aceptar')->post('/login_aceptar',[ControladorLogin::class, 'login_aceptar']);
Route::name('login_alta')->get('/login_alta',[ControladorLogin::class, 'login_alta']);
Route::name('login_registrar')->post('/login_registrar',[ControladorLogin::class, 'login_registrar']);
Route::name('logados')->get('/logados',[ControladorLogin::class, 'logados']);
Route::name('logout')->post('/logout',[ControladorLogin::class, 'logout']);

Route::name('panel_admin')->get('/panel_admin',[ControladorPanel::class, 'panel_admin'])->middleware('auth');

Route::name('personal')->get('/personal',[ControladorPersonal::class,'personal']);
Route::name('personal_alta')->get('/personal_alta',[ControladorPersonal::class,'personal_alta']);
Route::name('personal_registrar')->post('/personal_registrar', [ControladorPersonal::class, 'personal_registrar']);
Route::name('personal_detalle')->get('/personal_detalle/{id}',[ControladorPersonal::class, 'personal_detalle']);
Route::name('personal_editar')->get('/personal_editar/{id}', [ControladorPersonal::class, 'personal_editar']);
Route::name('personal_actualizar')->put('/personal_actualizar/{id}', [ControladorPersonal::class, 'personal_actualizar']);
Route::name('personal_borrar')->get('/personal_borrar/{id}', [ControladorPersonal::class, 'personal_borrar']);

Route::name('planta_alta')->get('/planta_alta',[ControladorPlantas::class,'planta_alta']);
Route::name('planta_registrar')->post('/planta_registrar', [ControladorPlantas::class, 'planta_registrar']);
Route::name('planta_detalle')->get('/planta_detalle/{id}',[ControladorPlantas::class, 'planta_detalle']);
Route::name('planta_editar')->get('/planta_editar/{id}', [ControladorPlantas::class, 'planta_editar']);
Route::name('planta_actualizar')->put('/planta_actualizar/{id}', [ControladorPlantas::class, 'planta_actualizar']);
Route::name('planta_borrar')->get('/planta_borrar/{id}', [ControladorPlantas::class, 'planta_borrar']);

Route::name('invernadero_alta')->get('/invernadero_alta',[ControladorInvernaderos::class,'invernadero_alta']);
Route::name('invernadero_registrar')->post('/invernadero_registrar', [ControladorInvernaderos::class, 'invernadero_registrar']);
Route::name('invernadero_detalle')->get('/invernadero_detalle/{id}',[ControladorInvernaderos::class, 'invernadero_detalle']);
Route::name('invernadero_editar')->get('/invernadero_editar/{id}', [ControladorInvernaderos::class, 'invernadero_editar']);
Route::name('invernadero_actualizar')->put('/invernadero_actualizar/{id}', [ControladorInvernaderos::class, 'invernadero_actualizar']);
Route::name('invernadero_borrar')->get('/invernadero_borrar/{id}', [ControladorInvernaderos::class, 'invernadero_borrar']);

Route::name('herramienta_alta')->get('/herramienta_alta',[ControladorHerramientas::class,'herramienta_alta']);
Route::name('herramienta_registrar')->post('/herramienta_registrar', [ControladorHerramientas::class, 'herramienta_registrar']);
Route::name('herramienta_detalle')->get('/herramienta_detalle/{id}',[ControladorHerramientas::class, 'herramienta_detalle']);
Route::name('herramienta_editar')->get('/herramienta_editar/{id}', [ControladorHerramientas::class, 'herramienta_editar']);
Route::name('herramienta_actualizar')->put('/herramienta_actualizar/{id}', [ControladorHerramientas::class, 'herramienta_actualizar']);
Route::name('herramienta_borrar')->get('/herramienta_borrar/{id}', [ControladorHerramientas::class, 'herramienta_borrar']);

Route::name('contactanos')->get('/contactanos', [ControladorContacto::class, 'contactanos']);
Route::name('contacto_enviar')->post('/contacto_enviar', [ControladorContacto::class, 'contacto_enviar']);

//-----------------------------------------PDF/Personal-----------------------------------------------------------------
Route::name('personal.pdf')->get('personal/pdf',[ControladorPersonal::class,'pdf']);
//Route::get('personal/pdf', [ControladorPersonal::class, 'pdf'])->name('personal.pdf');

//-----------------------------------------PDF/Plantas-----------------------------------------------------------------
Route::name('planta.pdf')->get('plantas/pdf',[ControladorPlantas::class,'pdf_planta']);

//-----------------------------------------PDF/Invernaderos-----------------------------------------------------------------
Route::name('invernadero.pdf')->get('invernaderos/pdf',[ControladorInvernaderos::class,'pdf_invernaderos']);

//-----------------------------------------PDF/Herramientas-----------------------------------------------------------------
Route::name('herramienta.pdf')->get('herramientas/pdf',[ControladorHerramientas::class,'pdf_herramientas']);

//-----------------------------------------Validaciones Usuario
Route::name('invernadero_validar')->get('/invernadero_validar',[HomeController::class, 'invernadero_validar'])->middleware('auth');
Route::name('productos_invernadero')->get('/productos_invernadero',[ControladorUsuario::class, 'productos_invernadero'])->middleware('auth');
Route::name('fertilizante_validar')->get('/fertilizante_validar',[HomeController::class, 'fertilizante_validar'])->middleware('auth');
Route::name('productos_fertilizante')->get('/productos_fertilizante',[ControladorUsuario::class, 'productos_fertilizante'])->middleware('auth');
Route::name('herramienta_validar')->get('/herramienta_validar',[HomeController::class, 'herramienta_validar'])->middleware('auth');
Route::name('productos_herramienta')->get('/productos_herramienta',[ControladorUsuario::class, 'productos_herramienta'])->middleware('auth');
Route::name('planta_validar')->get('/planta_validar',[HomeController::class, 'planta_validar'])->middleware('auth');
Route::name('productos_planta')->get('/productos_planta',[ControladorUsuario::class, 'productos_planta'])->middleware('auth');