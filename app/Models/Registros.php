<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    use HasFactory;

    protected $table = "registros";
    protected $primaryKey = "id_registro";
    protected $fillable = [
            'nombre',
             'imagen',
             'formato',
             'descripcion',
            'web',
            'review',
            'precio',
            'calificacion',
            'tamaño',
            'tono',
            'familia_color',
            'recompra',
            'pao',
            'fecha_agotado',
            'fecha_apertura',
            'fecha_compra'
            ];

}
