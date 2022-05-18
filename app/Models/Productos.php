<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    public $timestamps = true;
    // protected $table = "productos";
    // protected $primaryKey = "id_producto";
    protected $fillable = [
            'nombre',
            'marca',
            'categoria',
            'descripcion',
            'precio',
            'tipo',
            'tono',
            'web',
            'ean',
            'id_ultima_modificacion'];

    public function registros(){
        return $this->hasMany(Registros::class);
    }
    public function favusuarios(){
        return $this->belongsToMany(User::class)->withTimestamps();
   }

}
