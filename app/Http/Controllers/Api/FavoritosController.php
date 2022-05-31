<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Favoritos;


class FavoritosController extends Controller
{
    public function addFavorito(Request $request){
        $request->validate([
            'user_id' => 'unique:users',
            'producto_id' => 'unique:productos'
        ]);
        $favorito = new Favoritos();
        $favorito->user_id = $request->user->id;
        $favorito->producto_id = $request->producto->id;
        $favorito->save();
        //inserta una nueva linea en la tabla

        return response()->json([
            "status"=> 1,
            "mensaje"=>"¡El producto ha sido añadido a favoritos!"
        ]);

    }
    public function listFavoritos(){

    }

    public function eliminarFavorito(Request $request, $id){

    }
}
