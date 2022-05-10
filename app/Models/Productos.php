<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table = "productos";
    protected $primaryKey = "id_producto";
    protected $fillable = [
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
            'id_ultima_modificacion'];

    public function publican(){
        return $this->belongsToMany(UsuariosPublicanRegistrosDeProductos::class);
    }

}
