<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
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
        return $this->hasMany(Registro::class);
    }
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
   }

}
