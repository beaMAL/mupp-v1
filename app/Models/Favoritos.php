<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    /**
     * Tabla pivot: Relaciona id de dos tablas  distinas (M : N)
     */
    use HasFactory;
    public $timestamps = true;
    protected $table = "favoritos";
    protected $primaryKey = ['id_usu', 'id_producto'];
    protected $fillable = [

            ];

    public function usuarios(){
        return $this->belongsToMany(Usuario::class);
    }
}
