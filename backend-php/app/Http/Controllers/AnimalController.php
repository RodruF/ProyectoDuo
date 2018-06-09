<?php

namespace App\Http\Controllers;

use App\animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animales = animal::all();
        $response = Response::json($animales, 200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
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

        $json = $request->input('json', null);
        $params = json_decode($json);

        $nombre = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $descripcion = (!is_null($json) && isset($params->email)) ? $params->descripcion : null;
        $año = (!is_null($json) && isset($params->email)) ? $params->año : null;
        $image = (!is_null($json) && isset($params->email)) ? $params->image : null;

        $item->save();
        return response()->json('Agregado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\animal  $animal
     * @return \Illuminate\Http\Response
     */
    /*public function edit(animal $animal)
    {
    //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(animal $animal)
    {
        //
    }
}
