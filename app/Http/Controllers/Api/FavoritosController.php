<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Favoritos;
use App\Models\User;


class FavoritosController extends Controller
{
    public function addFavorito(Request $request, $producto_id){
        $user= auth()->user();
        // $request->validate([
        //     'producto_id' => 'required'
        // ]);
        $user_logueado = User::find($user->id);
        $user_logueado->productos()->attach($producto_id);
        //inserta una nueva linea en la tabla

        return response()->json([
            "status"=> 1,
            "mensaje"=>"¡El producto ha sido añadido a favoritos!"
        ]);



    }
    public function listFavoritos(Request $request){
        $user_id = auth()->user()->id;
        $consulta = DB::table('productos')
            ->join('favoritos', 'productos.id', '=', 'favoritos.producto_id')
            ->where('favoritos.user_id', $user_id)->get();

            return $consulta;
            // return response()->json([
            //     "status"=> 1,
            //     "mensaje"=>"¡El producto ha sido registrado con éxito!",
            //     "data"=> $consulta
            // ]);

    }

    public function eliminarFavorito(Request $request, $id_producto){
        $user_id = auth()->user()->id;
        // $request->validate([
        //     'producto_id' => 'required'
        // ]);
        $user_logueado = User::find($user_id);
        $user_logueado->productos()->detach($id_producto);

            return response()->json([
                "status"=> 1,
                "mensaje"=>"¡El producto ha sido registrado con éxito!",
            ]);
    }
}
