<?php

namespace App\Http\Controllers;

use App\cuidadoranimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CuidadoranimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cuidadorAanimales = cuidadoranimal::all();
        $response = Response::json($cuidadorAnimales, 200);
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
     * @param  \App\cuidadoranimal  $cuidadoranimal
     * @return \Illuminate\Http\Response
     */
    public function show(cuidadoranimal $cuidadoranimal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cuidadoranimal  $cuidadoranimal
     * @return \Illuminate\Http\Response
     */
    /*public function edit(cuidadoranimal $cuidadoranimal)
    {
    //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cuidadoranimal  $cuidadoranimal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuidadoranimal $cuidadoranimal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cuidadoranimal  $cuidadoranimal
     * @return \Illuminate\Http\Response
     */
    public function destroy(cuidadoranimal $cuidadoranimal)
    {
        //
    }
}
