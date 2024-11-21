<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Herramientas;

class ControladorHerramientas extends Controller
{
    public function herramientas(Request $request){

        $herramientas = Herramientas::Buscar($request->buscar)->paginate(5);
        return view('herramientas', compact('herramientas'));
    }

    public function herramienta_alta(){
        return view("herramienta_alta");
    }

    public function herramienta_registrar(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
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
            $img2 = "herramienta.png";
        }

        Herramientas::create(array(
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'imagen' => $img2
        ));

        return redirect()->route('herramientas');
    }

    public function herramienta_detalle($id){
        $query = Herramientas::find($id);
        return view("herramienta_detalle")
        ->with(['herramientas' => $query]);
    }

    public function herramienta_editar($id){
        $query = Herramientas::find($id);
        return view("herramienta_editar")
        ->with(['herramientas' => $query]);
    }

    public function herramienta_actualizar(Herramientas $id, Request $request) {
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
    
        // Actualiza la herramienta
        $id->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'imagen' => $img2
        ]);
    
        return redirect()->route("herramientas", ['id' => $id->id_herramienta]);
    }

    public function herramienta_borrar(Herramientas $id){
        $id->delete();
        return redirect()->route('herramientas');
    }
}
