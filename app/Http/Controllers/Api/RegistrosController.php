<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\UsuariosPublicanRegistrosDeProductos;
use Illuminate\Support\Facades\DB;

class RegistrosController extends Controller
{
   public function listarRegistrosDeProducto(Request $request, $producto_id){
    if(Producto::find($producto_id)->exists()){

        $num_registros = Registro::where('producto_id', $producto_id)
                                    ->count();
        if($num_registros > 0){
            $registros =Registro::where('producto_id', $producto_id)->get();

            return response()->json([
                "status"=> 1,
                "mensaje"=>"¡El producto tiene al menos un registro!",
                'numero-registros' => $num_registros,
                "data"=> $registros
            ]);

        }else{
            return response()->json([
                "status"=> 1,
                "mensaje"=>"¡El producto tiene al menos una calificacion!",
                'numero-registros' => $num_registros,
            ]);
        }

    }else{

    }





        //si hay error mensaje KO
   }
}
