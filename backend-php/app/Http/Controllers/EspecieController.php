<?php

namespace App\Http\Controllers;

use App\especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $especies = especie::all();
        $response = Response::json($especies, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function show(especie $especie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\especie  $especie
     * @return \Illuminate\Http\Response
     */
    /* public function edit(especie $especie)
    {
    //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, especie $especie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function destroy(especie $especie)
    {
        //
    }
}
