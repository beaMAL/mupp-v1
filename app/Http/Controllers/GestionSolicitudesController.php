<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudAltaProducto;
use Illuminate\Support\Facades\DB;

class GestionSolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return SolicitudAltaProducto::get();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new SolicitudAltaProducto;
        $producto->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * //@param  int  $id
     * @param \App\Models\SolicitudAltaProducto $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(SolicitudAltaProducto $solicitud)
    {
       return $solicitud;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * //@param  int  $id
     * @param \App\Models\SolicitudAltaProducto $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolicitudAltaProducto $solicitud)
    {
        $solicitud->delete();
    }
}
