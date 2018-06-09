<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Helpers\JwtAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hash = $request->header('Authorization', null);
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth->checkToken($hash);

        if ($checkToken) {
            $animales = Animal::all();
            $response = Response::json($animales, 200);
        } else {
            $data = array(
                'message' => 'Login incorrecto',
                'status' => 'error',
                'code' => 400,
            );

        }

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
        $hash = $request->header('Authorization', null);
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth->checkToken($hash);

        $json = $request->input('json', null);
        $params = json_decode($json);

        $especie = (!is_null($json) && isset($params->especie)) ? $params->especie : null;
        $nombre = (!is_null($json) && isset($params->nombre)) ? $params->nombre : null;
        $descripcion = (!is_null($json) && isset($params->descripcion)) ? $params->descripcion : null;
        $año = (!is_null($json) && isset($params->año)) ? $params->año : null;

        if ($checkToken) {
            if (is_null($especie) || is_null($nombre) || is_null($descripcion) || is_null($año)) {
                // TODO hay que meter la imagen
                $data = array(
                    'status' => 'error',
                    'code' => 422,
                    'message' => 'faltan campos',
                );
            } else {
                $animales = new Animal(array(
                    'especie' => trim($especie),
                    'nombre' => trim($nombre),
                    'descripcion' => trim($descripcion),
                    'año' => ($año),
                    // ((int) $request->año),
                    'idCuidador' => 1,
                ));
                $animales->save();
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'animal creado',
                );

            }

        } else {
            $data = array(
                'message' => 'autenticacion incorrecta',
                'status' => 'error',
                'code' => 400);
        }

        return response()->json($data, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //
    }
}
