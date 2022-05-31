<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;

class RegistrosController extends Controller
{
   public function listarRegistrosDeProducto(Request $request){
        $request->validate([
            'producto_id' =>'unique:productos'
        ]);

        //hay que mirar si ese producto tiene registros, si existe ese id en registros ??

        //si hay x {{  mensaje: ok, resultado: true o false}}


        //si hay error mensaje KO
   }
}
