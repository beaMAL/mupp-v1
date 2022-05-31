<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class UsuariosPublicanRegistrosDeProductos extends Model
{
    use HasFactory, HasApiTokens;
     /**
     * Tabla pivot: Relaciona id de dos tablas  distinas (M : N)
     */

    public $timestamps = true;
    protected $table = "publican_reg_productos";
    protected $primaryKey = ['user_id', 'registro_id'];
    protected $fillable = [

            ];

     public function usuario(){
         return $this->belongsTo(Usuario::class);
     }
     public function registro(){
        return $this->belongsTo(Registro::class);
    }

}
