<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Favoritos extends Model
{
    /**
     * Tabla pivot: Relaciona id de dos tablas  distinas (M : N)
     */
    use HasFactory, HasApiTokens;


    public $timestamps = true;
    protected $table = "favoritos";
    protected $primaryKey = ['user_id', 'producto_id'];
    protected $fillable = [

            ];

    public function users(){
        return $this->belongsToMany(Usuario::class);
    }
}
