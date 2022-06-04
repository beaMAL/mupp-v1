<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Producto;

class RaitingController extends Controller
{
    public function mediaRaiting(Request $request, $producto_id){
        //hay que comprobar si ese producto tiene registros
        if(Producto::find($producto_id)->exists() && (Registro::where('producto_id', $producto_id)
        ->count()>0)){
             //si los tiene hay que hacer  una media y devolverla
            ///contar el numero de valoraciones
            $num_caliificaciones = Registro::where('producto_id', $producto_id)
                                                ->whereNotNull('caliificacion')
                                                ->count();
            if($num_caliificaciones > 0){
                //calcular medaRaiting

                $promedio =  App\Models\Registro::where('producto_id', $producto_id)
                                                    ->whereNotNull('calificacion')
                                                    ->avg('calificacion');

                //devolver media y numero de calificaciones
                return response()->json([
                    "status"=> 1,
                    "mensaje"=>"¡El producto tiene al menos una calificacion!",
                    "data"=> [
                        'numero-calificaciones'=>$num_caliificaciones,
                        'promedio' => $promedio
                    ]
                ]);
            }else{
                //si no los tiene hay que devolver un 0 con 0 reviews
                return response()->json([
                    "status"=> 1,
                    "mensaje"=>"¡El producto tiene 0 calificaciones!",
                    "data"=> [
                        'numero-calificaciones'=>$num_caliificaciones,
                        'promedio' => 0
                    ]
                ]);
            }
        }else{
            return response()->json([
                "status"=> 0,
                "mensaje"=>"¡El registro no se ha encontrado!"
            ], 404);
        }
    }
}
