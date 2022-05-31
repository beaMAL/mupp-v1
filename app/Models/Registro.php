<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Registro extends Model
{
    use HasFactory, HasApiTokens;


    public $timestamps = true;
    protected $table = "registros";
    // protected $primaryKey = "registro_id";
    protected $fillable = [
            'nombre',
            'producto_id',
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

    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
    public function users(){
         return $this->belongsToMany(User::class)->withTimestamps();
    }
}
