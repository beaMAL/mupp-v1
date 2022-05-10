<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    use HasFactory;

    protected $table = "usuario";
    protected $primaryKey = "id_usu";
    protected $fillable = [
            'nombre',
             'correo',
             'contraseña',
             'is_user',
            'is_admin',
            'created_at',
            'updates_at'];

    public function solicitudes(){
        return $this->hasMany(SolicitudAltaProducto::class);
    }
    public function favoritos(){
        return $this->belongsToMany(Favoritos::class);
    }
    public function publican(){
        return $this->belongsToMany(UsuariosPublicanRegistrosDeProductos::class);
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function isUser()
    {
        return $this->is_staff;
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 404);
        return true;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->$role) {
                    return true;
                }
            }
        } else {
            if ($this->$roles) {
                return true;
            }
        }
        return false;
    }

}
