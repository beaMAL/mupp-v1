<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Producto;

class RaitingController extends Controller
{
    public function medaRaiting(Request $request, $producto_id){
        //hay que comprobar si ese producto tiene registros

            //si los tiene hay que hacer  una media y devolverla

            //si no los tiene hay que devolver un 0 con 0 reviews
            
    }
}
