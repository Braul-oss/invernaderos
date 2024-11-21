<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantas extends Model
{
    use HasFactory;
    protected $table = 'tb_planta';
    protected $primaryKey = 'id_planta';
    protected $fillable =  [
        'nombre',
        'tipo',
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
            $query->where(\DB::raw("CONCAT(nombre, '', tipo, '', precio)"), "LIKE", "%$buscar%");
        }
    }

    public function scopeTipo($query, $nombre){
        if($nombre != "") {
            $query->where('nombre', $nombre);
        }
    }
}
