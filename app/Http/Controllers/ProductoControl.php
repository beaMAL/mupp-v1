<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::get();
        return response()->json(['mensaje' => 'ok']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->create($request->all());
        return response()->json(['mensaje' => 'ok']);

    }

    /**
     * Display the specified resource.
     *
     * //@param  int  $id
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
       return $producto;
       return response()->json(['mensaje' => 'ok']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
   // public function update(Request $request, $id)
    public function update(Request $request, Producto $producto)
    {
        $producto->fill($request->post())->save();
        return response()->json(['producto'=> $producto]);

        // try{
        //     Producto::find($id)->update($request->all());
        //     return response()->json('Product updated!');
        // }catch(Exception $e){
        //     console.log($e->getMessage());
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
       return response()->json(['mensaje' => 'ok']);
    }
}
