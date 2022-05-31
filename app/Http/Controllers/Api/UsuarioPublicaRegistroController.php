<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsuariosPublicanRegistrosDeProductos;
use App\Models\User;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsuarioPublicaRegistroController extends Controller
{
    public function registrarProducto(Request $request){
        //validar los campos de registros para
        $request->validate([
            'producto_id' => 'required',
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
        $registro = new Registro();
        $registro->producto_id = $request->producto_id;
        $registro->imagen = $request->imagen;
        $registro->formato = $request->formato;
        $registro->web = $request->web;
        $registro->review = $request->review;
        $registro->precio = $request->precio;
        $registro->calificacion = $request->calificacion;
        $registro->tamaño = $request->tamaño;
        $registro->tono = $request->tono;
        $registro->familia_color = $request->familia_color;
        $registro->recompra = $request->recompra;
        $registro->pao = $request->pao;
        $registro->fecha_compra = $request->fecha_compra;
        $registro->fecha_apertura = $request->fecha_apertura;
        $registro->fecha_agotado = $request->fecha_agotado;

        if (auth()->user()) {
            $user = auth()->user();


            $publicacion = new UsuariosPublicanRegistrosDeProductos();
            try{
                //transaction
                $resultado = DB::transaction(function () use ($publicacion, $registro, $user){
                    $registro->save();
                    $registro_id = $registro->id;
                    // $publicacion->user_id = $user->id;
                    // $publicacion->registro_id = $registro_id;
                    // $publicacion->save();
                    $user_logueado = User::find($user->id);
                    $user_logueado->registros()->attach($registro_id);

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
        }else{
            return response()->json([
                "status"=> 0,
                "mensaje"=>"¡El usuario debe iniciar sesion!"
            ]);
        }

    }

    public function listarRegistrosDeUsuario(Request $request){
        $user_id = auth()->user()->id;
        $consulta = DB::table('registros')
            ->join('publican_reg_productos', 'registros.id', '=', 'publican_reg_productos.registro_id')
            ->where('publican_reg_productos.user_id', $user_id)->get();

            return response()->json([
                "status"=> 1,
                "mensaje"=>"¡El producto ha sido registrado con éxito!",
                "data"=> $consulta
            ]);
    }

    public function modificarRegistro(Request $request) {


    }
}
