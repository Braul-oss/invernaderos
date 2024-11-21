<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Barryvdh\DomPDF\Facade\Pdf;


class ControladorPersonal extends Controller
{
    public function personal(Request $request){

        $personal = Personal::Buscar($request->buscar)->paginate(5);
        return view('personal', compact('personal'));
    }

    public function personal_alta(){
        return view("personal_alta");
    }

    public function personal_registrar(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'curp' => 'required',
            'rfc' => 'required',
            'cargo' => 'required'
        ]);

        if($request->file('foto') !=''){
            $file = $request->file('foto');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 = "personal.jpg";
        }

        Personal::create(array(
            'nombre' => $request->input('nombre'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'curp' => $request->input('curp'),
            'rfc' => $request->input('rfc'),
            'cargo' => $request->input('cargo'),
            'foto' => $img2
        ));

        return redirect()->route('personal');
    }

    public function personal_detalle($id){
        $query = Personal::find($id);
        return view("personal_detalle")
        ->with(['personal' => $query]);
    }

    public function personal_editar($id){
        $query = Personal::find($id);
        return view("personal_editar")
        ->with(['personal' => $query]);
    }

    public function personal_actualizar(Personal $id, Request $request) {
        $this->validate($request, [
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'curp' => 'required',
            'rfc' => 'required',
            'cargo' => 'required',
        ]);
    
        // Guardar la imagen solo si se ha subido una nueva
        if ($request->hasFile('foto')) {
            // Eliminar la imagen anterior si existe
            if ($id->foto1) {
                \Storage::disk('local')->delete($id->foto);
            }
    
            // Guardar la nueva imagen
            $file = $request->file('foto');
            $img2 = $file->store('storage_path'); // Guarda en la carpeta img
        } else {
            // Mantener la imagen anterior si no se subió una nueva
            $img2 = $id->foto;
        }
    
        // Actualizar el personal
        $id->update([
            'nombre' => $request->input('nombre'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'curp' => $request->input('curp'),
            'rfc' => $request->input('rfc'),
            'cargo' => $request->input('cargo'),
            'foto' => $img2
        ]);
    
        return redirect()->route("personal", ['id' => $id->id_personal]);
    }

    public function personal_borrar(Personal $id){
        $id->delete();
        return redirect()->route('personal');
    }

    public function pdf(Request $request){
        // Iniciar la consulta base
        $query = Personal::query();
    
        // Aplicar filtros si existen
        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%')
                  ->orWhere('app', 'like', '%' . $request->buscar . '%')
                  ->orWhere('apm', 'like', '%' . $request->buscar . '%')
                  ->orWhere('telefono', 'like', '%' . $request->buscar . '%');
        }
    
        // Obtener los registros filtrados o todos
        $personal = $query->get();
    
        // Generar el PDF
        $pdf = Pdf::loadView('personal.pdf', compact('personal'));
    
        // Descargar el PDF
        return $pdf->download("lista_de_personal.pdf");
    }

}
