<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|max: 60',
            'email' => 'required|email|unique:users|max: 60',
            'password' => 'required|confirmed',
        ]);
        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);

        $user->save();

        return response()->json([
            "status"=> 1,
            "mensaje"=>"¡El usuario ha sido registrado con éxito!"
        ]);


    }
     /**
      * Recibimosla informacion del form login:
        -Validamos los datos
        -Comprobamos si ese usuario exite en la tabla Users
        -Creamos token de la sesion
      */
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|max: 60',
            'password' => 'required',
        ]);
        $user = User::where("email", "=", $request->email)->first();
        if( isset($user->id)){
            if(Hash::check($request->password, $user->password)){
                //Creamos token
                $token = $user->createToken("auth_token")->plainTextToken;

                //Create
                return response()->json([
                    "status"=> 1,
                    "mensaje"=>"¡El usuario ha sido logueado con éxito!",
                    "acces_token"=>$token
                ]);

            }else{
                //pass no es correcta
                return response()->json([
                    "status"=> 0,
                    "mensaje"=>"La password es incorrecta"
                ], 404);
            }
        }else{
            return response()->json([
                "status"=> 0,
                "mensaje"=>"Usuario no registrado"
            ], 404);
        }
    }
    public function perfilUsuario(){
        //Create
        return response()->json([
            "status"=> 0,
            "mensaje"=>"Perfil de usuario",
           "data" => auth()->user()
        ]);

    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "status"=> 1,
            "mensaje"=>"Se ha cerradp la sesion",
        ]);
    }
}
