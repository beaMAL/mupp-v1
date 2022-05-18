<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudAltaProducto extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = "solicitud_alta_productos";
    protected $primaryKey = "id_solicitud";
    protected $fillable = [
            'user_id',
            'nombre',
             'marca',
             'categoria',
             'descripcion',
            'precio',
            'tipo',
            'tono',
            'web',
            'id_ultima_modificacion',
            'fecha_solicitud'];

    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
