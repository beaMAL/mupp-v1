<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductoControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Productos::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Productos;
        $producto->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * //@param  int  $id
     * @param \App\Models\Productos $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $producto)
    {
       return $producto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * //@param  int  $id
     * @param \App\Models\Productos $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $producto)
    {
        $producto->delete();
    }
}
