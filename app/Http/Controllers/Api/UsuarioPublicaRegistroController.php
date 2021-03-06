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


            try{
                //transaction
                $resultado = DB::transaction(function () use ( $registro, $user){
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
    public function listarCalificacionesDeUsuario(Request $request){
        $user_id = auth()->user()->id;

        $num_caliificaciones = DB::table('registros')
            ->selectRaw('COUNT(registros.id) as num_caliificaciones ')
            ->groupBy('publican_reg_productos.user_id')
            ->join('publican_reg_productos', 'registros.id', '=', 'publican_reg_productos.registro_id')
            ->where('publican_reg_productos.user_id', $user_id)
            ->get();

        if($num_caliificaciones > 0){
            $consulta =  DB::table('registros')
            ->selectRaw('calificacion, COUNT(registros.id) as numero_registros')
            ->groupBy('registros.calificacion')
            ->join('publican_reg_productos', 'registros.id', '=', 'publican_reg_productos.registro_id')
            ->where('publican_reg_productos.user_id', 11)
            ->get();

                return response()->json([
                    "status"=> 1,
                    "mensaje"=>"¡El producto ha sido registrado con éxito!",
                    "data"=> $consulta
                ]);
        }else{
            return response()->json([
                "status"=> 1,
                "mensaje"=>"¡El producto tiene 0 calificaciones!",
                "data"=> [
                    'numero-calificaciones'=>$num_caliificaciones,
                    'promedio' => 0
                ]
            ]);
        }


    }

    public function modificarRegistro(Request $request, $registro_id) {
        $user_id = auth()->user()->id;
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

            if (UsuariosPublicanRegistrosDeProductos::where(["user_id" =>$user_id, "registro_id" =>$registro_id])) {
                //si existe lo podemos actualizar la registro
                $registro = Registro::find($registro_id);
                $registro->imagen = isset($request->imagen) ? $request->imagen : $registro->imagen;
                $registro->formato = isset($request->formato) ? $request->formato : $registro->formato;
                $registro->web = isset($request->web) ? $request->web : $registro->web;
                $registro->review = isset($request->review)? $request->review : $registro->review;
                $registro->precio = isset($request->precio)? $request->precio : $registro->precio;
                $registro->calificacion = isset($request->calificacion)? $request->calificacion : $registro->calificacion;
                $registro->tamaño = isset($request->tamaño)? $request->tamaño : $registro->tamaño;
                $registro->tono = isset($request->tono)? $request->tono : $registro->tono;
                $registro->familia_color = isset($request->familia_color)? $request->familia_color : $registro->familia_color;
                $registro->recompra = isset($request->recompra)? $request->recompra : $registro->recompra;
                $registro->pao = isset($request->pao)? $request->pao : $registro->pao;
                $registro->fecha_compra = isset($request->fecha_compra)? $request->fecha_compra : $registro->fecha_compra;
                $registro->fecha_apertura = isset($request->fecha_apertura)? $request->fecha_apertura : $registro->fecha_apertura;
                $registro->fecha_agotado = isset($request->fecha_agotado)? $request->fecha_agotado : $registro->fecha_agotado;
                $registro->save();

                //respuesta del update

                return response()->json([
                    "status"=> 1,
                    "mensaje"=>"¡El registro ha sido actualizado con éxito!"
                ]);
            }else{
                return response()->json([
                    "status"=> 0,
                    "mensaje"=>"¡El registro no se ha encontrado!"
                ], 404);

            }

    }
    public function eliminarRegistro(Request $request, $registro_id) {
        $user_id = auth()->user()->id;
        if (UsuariosPublicanRegistrosDeProductos::where(["user_id" =>$user_id, "registro_id" =>$registro_id])) {
            $user = User::find($user_id);
            $user->registros()->detach($request->registro_id);
            //¿Queremos mantener la informacion del registro?
            //$registro= Registro::where(['registro_id' => $registro_id])->first();
            //$registro->delete();

            return response()->json([
                "status"=> 1,
                "mensaje"=>"¡El registro de este usuario ha sido eliminado con éxito!"
            ]);

        }else{
            return response()->json([
                "status"=> 0,
                "mensaje"=>"¡El registro no se ha encontrado!"
            ], 404);
        }
    }
}
