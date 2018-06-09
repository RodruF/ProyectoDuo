<?php

namespace App\Http\Controllers;

use App\jaula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JaulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jaulas = jaula::all();
        $response = Response::json($jaulas, 200);
        return $response;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
    //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $item = new Item([
            'nombre' => $request->get('nombre'),
            'concepto' => $request->get('concepto'),
            'image' => $request->get('image')
        ]);
        $item->save();
        return response()->json('Agregado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jaula  $jaula
     * @return \Illuminate\Http\Response
     */
    public function show(jaula $jaula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jaula  $jaula
     * @return \Illuminate\Http\Response
     */
    /*public function edit(jaula $jaula)
    {
    //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jaula  $jaula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jaula $jaula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jaula  $jaula
     * @return \Illuminate\Http\Response
     */
    public function destroy(jaula $jaula)
    {
        //
    }
}
