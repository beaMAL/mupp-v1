<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsuariosPublicanRegistrosDeProductos;
use App\Models\Registros;
use Illuminate\Support\Facades\DB;

class UsuarioPublicaRegistroController extends Controller
{
    public function registrarProducto(Request $request, $user){
        //validar los campos de registros para
        $request->validate([
            'producto_id' => 'unique:productos',
            'imagen' => 'nullable',
            'formato' => 'required',
            'web' => 'nullable',
            'review' => 'nullable|string|max: 400',
            'precio' => 'nullable|numeric|digits_between:0,4000',
            'calificacion' => 'nullable|numeric|digits_between:0,5',
            'tamaño' => 'nullable',
            'tono' => 'nullable',
            'familia_color' => 'nullable',
            'recompra' => 'boolean',
            'pao' => 'nullable',
            'fecha_compra' => 'nullable|date',
            'fecha_apertura' => 'nullable|date',
            'fecha_agotado' => 'nullable|date',
        ]);
        //Crear un objeto registro  para
        $registro = new Registros();
        $registro->producto_id = $request->producto_id;
        $registro->imagen = $request->imagen;
        $registro->formato = $request->formato;
        $registro->web = $request->web;
        $registro->review = $request->review;
        $registro->$precio = $request->precio;
        $registro->calificacion = $request->calificacion;
        $registro->tamaño = $request->tamaño;
        $registro->tono = $request->tono;
        $registro->familia_color = $request->familia_color;
        $registro->recompra = $request->recompra;
        $registro->pao = $request->pao;
        $registro->fecha_compra = $request->fecha_compra;
        $registro->fecha_apertura = $request->fecha_apertura;
        $registro->fecha_agotado = $request->fecha_agotado;

        $publicacion = new UsuariosPublicanRegistrosDeProductos();
        try{
            //transaction
            $resultado = DB::transaction(function () use ($publicacion, $registro, $user){
                $registro->save();
                $registro_id = $registro->id;
                $publicacion->user_id = $user->id;
                $publicacion->registro_id = $registro_id;
                $publicacion->save();

            });

        }catch(Exception $e){
           report($e);
           return response()->json([
            "status"=> 0,
            "mensaje"=>"No se ha podido completar el registro por un error en la BBDD"
           ], 404);
        }
        return response()->json([
            "status"=> 1,
            "mensaje"=>"¡El producto ha sido registrado con éxito!"
        ]);
    }

    public function modificarRegistro(Request $request) {
        

    }
}
