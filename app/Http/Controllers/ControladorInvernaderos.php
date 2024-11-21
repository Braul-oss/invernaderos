<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invernaderos;

class ControladorInvernaderos extends Controller
{
    public function invernadero(Request $request){

         $invernadero = Invernaderos::Buscar($request->buscar)->paginate(5);
        return view('invernadero', compact('invernadero'));
        
    }

    public function invernadero_alta(){
        return view("invernadero_alta");
    }

    public function invernadero_registrar(Request $request){
        $this->validate($request,[
            'tipo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

        if($request->file('imagen') !=''){
            $file = $request->file('imagen');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 = "invernadero.png";
        }

        Invernaderos::create(array(
            'tipo' => $request->input('tipo'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'imagen' => $img2
        ));

        return redirect()->route('invernadero');
    }

    public function invernadero_detalle($id){
        $query = Invernaderos::find($id);
        return view("invernadero_detalle")
        ->with(['invernadero' => $query]);
    }

    public function invernadero_editar($id){
        $query = Invernaderos::find($id);
        return view("invernadero_editar")
        ->with(['invernadero' => $query]);
    }

    public function invernadero_actualizar(Invernaderos $id, Request $request) {
        $this->validate($request, [
            'tipo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
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
    
        // Actualiza el invernadero
        $id->update([
            'tipo' => $request->input('tipo'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'imagen' => $img2
        ]);
    
        return redirect()->route("invernadero", ['id' => $id->id_invernadero]);
    }

    public function invernadero_borrar(Invernaderos $id){
        $id->delete();
        return redirect()->route('invernadero');
    }
}
