<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolicitudAltaProducto;

class SolicitudAltaProductoController extends Controller
{
   public function nuevaSolicitudAction(Request $request){
        //validar datos
        $user_id = auth()->user()->id;
        $request->validate([
            'nombre' => 'required|max:50',
            'marca' => 'required|max:60',
            'categoria' => 'required|max:50',
            'precio' => 'nullable|numeric|digits_between:0,4000',
            'descripcion' => 'nullable|string|max: 400',
            'tono' => 'nullable',
            'web' => 'nullable',
        ]);
        $solicitud= new SolicitudAltaProducto();
        $solicitud->user_id = $user_id;
        $solicitud->nombre = $request->nombre;
        $solicitud->marca = $request->marca;
        $solicitud->categoria = $request->categoria;
        $solicitud->precio = $request->precio;
        $solicitud->descripcion = $request->descripcion;
        $solicitud->tono = $request->tono;
        $solicitud->web = $request->web;
        $solicitud->save();

        return response()->json([
            "status"=> 1,
            "mensaje"=>"¡El registro ha sido actualizado con éxito!"
        ]);

   }

}
