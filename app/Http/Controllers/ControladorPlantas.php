<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plantas;
use Barryvdh\DomPDF\Facade\Pdf;

class ControladorPlantas extends Controller
{
    public function planta(Request $request){

        $planta = Plantas::Buscar($request->buscar)->paginate(5);
        return view('planta', compact('planta'));
    }

    public function planta_alta(){
        return view("planta_alta");
    }

    public function planta_registrar(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);

        if($request->file('imagen') !=''){
            $file = $request->file('imagen');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 = "planta.png";
        }

        Plantas::create(array(
            'nombre' => $request->input('nombre'),
            'tipo' => $request->input('tipo'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'imagen' => $img2
        ));

        return redirect()->route('planta');
    }

    public function planta_detalle($id){
        $query = Plantas::find($id);
        return view("planta_detalle")
        ->with(['planta' => $query]);
    }

    public function planta_editar($id){
        $query = Plantas::find($id);
        return view("planta_editar")
        ->with(['planta' => $query]);
    }

    public function planta_actualizar(Plantas $id, Request $request) {
        $this->validate($request, [
            'nombre' => 'required',
            'tipo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
        ]);
    
        // Guardar la imagen solo si se ha subido una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($id->imagen1) {
                \Storage::disk('local')->delete($id->imagen);
            }
    
            // Guardar la nueva imagen
            $file = $request->file('imagen');
            $img2 = $file->store('storage_path'); // Guarda en la carpeta img
        } else {
            // Mantener la imagen anterior si no se subió una nueva
            $img2 = $id->imagen;
        }
    
        // Actualizar la planta
        $id->update([
            'nombre' => $request->input('nombre'),
            'tipo' => $request->input('tipo'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'imagen' => $img2
        ]);
    
        return redirect()->route("planta", ['id' => $id->id_planta]);
    }

    public function planta_borrar(Plantas $id){
        $id->delete();
        return redirect()->route('planta');
    }

    public function pdf_planta(Request $request){
        // Iniciar la consulta base
        $query = Plantas::query();
    
        // Aplicar filtros si existen
        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%')
                  ->orWhere('tipo', 'like', '%' . $request->buscar . '%')
                  ->orWhere('precio', 'like', '%' . $request->buscar . '%');
        }
    
        // Obtener los registros filtrados o todos
        $planta = $query->get();
    
        // Generar el PDF
        $pdf = Pdf::loadView('plantas.pdf', compact('planta'));
    
        // Descargar el PDF
        return $pdf->download("lista_de_plantas.pdf");
    }

    public function planta_grafica(){
        $tipos = \DB::table('tb_planta')
        ->select('tipo',
        \DB::raw('count(*) as total'))
        ->groupBy('tipo')
        ->get();

        $precios = \DB::table('tb_planta')
        ->select('nombre', 'precio')
        ->get();

        return view('planta_grafica', compact('tipos', 'precios'));
    }
}

