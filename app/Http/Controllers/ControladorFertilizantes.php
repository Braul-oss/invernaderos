<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fertilizantes;
use Barryvdh\DomPDF\Facade\Pdf;


class ControladorFertilizantes extends Controller
{
    public function fertilizantes(Request $request){
        $fertilizante = Fertilizantes::Buscar($request->buscar)->paginate(5);
        return view('fertilizantes', compact('fertilizante'));
    }

    public function fertilizante_alta(){
        return view("fertilizante_alta");
    }

    public function fertilizante_registrar(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
        ]);

        if($request->file('imagen') !=''){
            $file = $request->file('imagen');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 = "fertilizante.png";
        }

        Fertilizantes::create(array(
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'imagen' => $img2
        ));

        return redirect()->route('fertilizantes');
    }

    public function fertilizante_detalle($id){
        $query = Fertilizantes::find($id);
        return view("fertilizante_detalle")
        ->with(['fertilizante' => $query]);
    }

    public function fertilizante_editar($id){
        $query = Fertilizantes::find($id);
        return view("fertilizante_editar")
        ->with(['fertilizante' => $query]);
    }

    public function fertilizante_actualizar(Fertilizantes $id, Request $request) {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
        ]);
    
        // Guarda la imagen solo si se ha subido una nueva
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($id->imagen1) {
                \Storage::disk('local')->delete($id->imagen);
            }
    
            // Guarda la nueva imagen
            $file = $request->file('imagen');
            $img2 = $file->store('storage_path'); // Guarda en la carpeta img
        } else {
            // Mantiene la imagen anterior si no se subió una nueva
            $img2 = $id->imagen;
        }
    
        // Actualiza el fertilizante
        $id->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'imagen' => $img2
        ]);
    
        return redirect()->route("fertilizantes", ['id' => $id->id_fertilizante]);
    }

    public function fertilizante_borrar(Fertilizantes $id){
        $id->delete();
        return redirect()->route('fertilizantes');
    }

    public function pdf_fertilizantes(Request $request){
        // Iniciar la consulta base
        $query = Fertilizantes::query();
    
        // Aplicar filtros si existen
        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%')
                  ->orWhere('descripcion', 'like', '%' . $request->buscar . '%')
                  ->orWhere('precio', 'like', '%' . $request->buscar . '%');
        }
    
        // Obtener los registros filtrados o todos
        $fertilizante = $query->get();
    
        // Generar el PDF
        $pdf = Pdf::loadView('fertilizantes.pdf', compact('fertilizante'));
    
        // Descargar el PDF
        return $pdf->download("lista_de_fertilizantes.pdf");
    }

    public function fertilizante_grafica(){
        $nombres = \DB::table('tb_fertilizantes')
        ->select('nombre',
        \DB::raw('count(*) as total'))
        ->groupBy('nombre')
        ->get();

        $precios = \DB::table('tb_fertilizantes')
        ->select('nombre', 'precio')
        ->get();

        return view('fertilizante_grafica', compact('nombres', 'precios'));
    }
}
