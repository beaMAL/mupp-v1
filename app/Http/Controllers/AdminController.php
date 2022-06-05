<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller

   ///Hay que cambiar este controlador por completo a tipo Api, es decir que compruebe el tipo de user al hacer el login para


   //investigar esto para una spa
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }
}
