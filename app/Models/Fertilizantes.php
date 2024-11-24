<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizantes extends Model
{
    use HasFactory;
    protected $table = 'tb_fertilizantes';
    protected $primaryKey = 'id_fertilizante';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',  
    ];

    public function scopeBuscar($query, $buscar){
        //dd("scope: " . $buscar);
        if(trim($buscar) != "") {
            //$query->where('nombre', $buscar);
            //$query->where(\DB::raw("CONCAT(nombre, '',correo, '', rol)"), $buscar);
            $query->where(\DB::raw("CONCAT(nombre, '', descripcion, '', precio)"), "LIKE", "%$buscar%");
        }
    }

    public function scopeTipo($query, $nombre){
        if($nombre != "") {
            $query->where('nombre', $nombre);
        }
    }
}
