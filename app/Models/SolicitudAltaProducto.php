<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudAltaProducto extends Model
{
    use HasFactory;


    protected $table = "solicitud_alta_productos";
    protected $primaryKey = "id_solicitud";
    protected $fillable = [
            'id_usu_alta',
            'nombre',
             'marca',
             'categoria',
             'descripcion',
            'precio',
            'tipo',
            'tono',
            'web',
            'created_at',
            'fecha_modificacion',
            'id_ultima_modificacion',
            'fecha_solicitud'];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
