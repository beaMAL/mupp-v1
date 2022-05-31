<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     */
    protected $table= "users";
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo_usuario'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function solicitudes(){
        return $this->hasMany(SolicitudAltaProducto::class);
    }
    public function productos(){
        return $this->belongsToMany(Producto::class, 'favoritos')->withTimestamps();
   }
    public function registros(){
        return $this->belongsToMany(Registro::class, 'publican_reg_productos')->withTimestamps();
    }
    // public function productosModificados(){
    //     return $this->hasMany(Producto::class, 'id_ultima_modificacion', 'id' );
    // }

    public function tipoUsuario(){
        return $this->tipo_usuario;
    }


}
