<?php

namespace App\Http\Controllers;

use App\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos = producto::all();
        $response = Response::json($productos, 200);
        return $response;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item([
           
            'image' => $request->get('image'),
            'descrpcion' => $request->get('descrpcion'),
             'nombre' => $request->get('nombre'),
             'precio' => $request->get('precio'),
             'stock' => $request->get('stock')
        ]);
        $item->save();
        return response()->json('Agregado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }
}
