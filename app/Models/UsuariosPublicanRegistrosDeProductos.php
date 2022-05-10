<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosPublicanRegistrosDeProductos extends Model
{
    use HasFactory;


    protected $table = "publican_reg_productos";
    protected $primaryKey = ['id_usu', 'id_producto', 'id_registro'];
    protected $fillable = [
            'fecha_favorito'
            ];

     public function usuario(){
         return $this->belongsTo(Usuario::class);
     }
     public function registro(){
        return $this->belongsTo(Registro::class);
    }
    public function productos(){
        return $this->belongsToMany(Productos::class);
    }
}
