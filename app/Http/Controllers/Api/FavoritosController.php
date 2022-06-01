<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Favoritos;


class FavoritosController extends Controller
{
    public function addFavorito(Request $request){
        // $user_id = auth()->user();
        $request->validate([
            'producto_id' => 'required'
        ]);
        $user_logueado = User::find($user->id);
        $user_logueado->productos()->attach($request->producto_id);
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

            return response()->json([
                "status"=> 1,
                "mensaje"=>"¡El producto ha sido registrado con éxito!",
                "data"=> $consulta
            ]);

    }

    public function eliminarFavorito(Request $request){
        $user_id = auth()->user()->id;
        $request->validate([
            'producto_id' => 'required'
        ]);
        $user_logueado = User::find($user->id);
        $user_logueado->productos()->detach($request->producto_id);

            return response()->json([
                "status"=> 1,
                "mensaje"=>"¡El producto ha sido registrado con éxito!",
                "data"=> $consulta
            ]);
    }
}
