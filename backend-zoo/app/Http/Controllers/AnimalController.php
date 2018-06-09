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

        if ($checkToken) {
            $json = $request->input('json', null);
            $params = json_decode($json);

            $nombre = (!is_null($json) && isset($params->nombre)) ? $params->nombre : null;
            $descrpcion = (!is_null($json) && isset($params->descripcion)) ? $params->descripcion : null;
            $año = (!is_null($json) && isset($params->año)) ? $params->año : null;
            if ((!$request->nombre) || (!$request->descripcion) || (!$request->año)) {

                $animales = new Animal();
                $animales->nombre = $nombre;
                $usuarios->descripcion = $descrpcion;
                $usuarios->año = $año;
                $animales->save();

                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'animal creado',
                );

            } else {
                
                $data = array(
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'faltan campos',
                );

            }
        } else {
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'no autorizado',
            );
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
