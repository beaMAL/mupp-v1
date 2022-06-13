<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudAltaProducto;
use App\Models\User;

class GestionSolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->is_admin()){
            return SolicitudAltaProducto::get();

        }
        return  response()->json(["message" => "Forbidden"], 403);

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
        return response()->json([
            'solicitud'=>$producto
        ]);
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
        return response()->json(['mensaje' => 'ok']);

        return $solicitud;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\SolicitudAltaProducto $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            SolicitudAltaProducto::find($id)->update($request->all());
            return response()->json(['mensaje' => 'ok']);

        }catch(Exception $e){
            console.log($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $id)
    {
        try{
            $solicitud = SolicitudAltaProducto::find($id);
            $solicitud->delete();
            return response()->json('Solicitud deleted!');
        }catch(Exception $e){
            console.log($e->getMessage());
        }

    }
}
