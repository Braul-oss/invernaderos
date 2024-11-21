<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invernaderos extends Model
{
    use HasFactory;
    protected $table = 'tb_tinvernadero';
    protected $primaryKey = 'id_invernadero';
    protected $fillable =  [
        'tipo',
        'descripcion',
        'precio',
        'imagen',
    ];

    public function scopeBuscar($query, $buscar){
        //dd("scope: " . $buscar);
        if(trim($buscar) != "") {
            //$query->where('nombre', $buscar);
            //$query->where(\DB::raw("CONCAT(nombre, '',correo, '', rol)"), $buscar);
            $query->where(\DB::raw("CONCAT(tipo, '', descripcion, '', precio)"), "LIKE", "%$buscar%");
        }
    }

    public function scopeTipo($query, $tipo){
        if($tipo != "") {
            $query->where('tipo', $tipo);
        }
    }
}
