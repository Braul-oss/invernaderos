<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table = 'tb_personal';
    protected $primaryKey = 'id_personal';
    protected $fillable =  [
        'nombre',
        'app',
        'apm',
        'telefono',
        'email',
        'curp',
        'rfc',
        'cargo',
        'foto',
    ];

    public function scopeBuscar($query, $buscar){
        //dd("scope: " . $buscar);
        if(trim($buscar) != "") {
            //$query->where('nombre', $buscar);
            //$query->where(\DB::raw("CONCAT(nombre, '',correo, '', rol)"), $buscar);
            $query->where(\DB::raw("CONCAT(nombre, '', telefono, '', cargo)"), "LIKE", "%$buscar%");
        }
    }

    public function scopeTipo($query, $nombre){
        if($nombre != "") {
            $query->where('nombre', $nombre);
        }
    }
}
