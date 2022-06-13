<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class MustBeAdministrator
{

    public function handle(Request $request, Closure $next)
    {
       if ( auth()->user()?->tipo_usuario !== 0){
           abort(403);
       }

       return $next( $request );
    }
}
