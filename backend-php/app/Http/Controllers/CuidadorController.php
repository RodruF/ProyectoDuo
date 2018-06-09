<?php

namespace App\Http\Controllers;

use App\cuidador;
use Illuminate\Http\Request;

class CuidadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cuidadores = cuidador::all();
        $response = Response::json($cuidadores, 200);
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
        $json = $request->input('json', null);
        $params = json_decode($json);

        $nombre = (!is_null($json) && isset($params->nombre)) ? $params->nombre : null;
        $apellido = (!is_null($json) && isset($params->apellido)) ? $params->apellido : null;
        $especialidad = (!is_null($json) && isset($params->especialidad)) ? $params->especialidad : null;
        $correo = (!is_null($json) && isset($params->correo)) ? $params->correo : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $image = (!is_null($json) && isset($params->image)) ? $params->image : null;
        $role = 'cuidador';

        if (!is_null($correo) && !is_null($password) && !is_null($nombre)) {
            // crear usuario
            $cuidador = new cuidador();
            $cuidador->correo = $correo;
            $cuidador->nombre = $nombre;
            $cuidador->apellido = $apellido;
            $cuidador->especialidad = $especialidad;
            $cuidador->role = $role;
            $cuidador->image = $image;
            $pwd = hash('sha256', $password);
            $cuidador->password = $pwd;

            //comprobar cuidador duplicado
            $isset_cuidador = [cuidador::where('correo', '=', $correo)->first()];

            if (count($isset_cuidador) == 0) {
                //guardar usuario
                $cuidador->save();
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'usuario creado',
                );

            } else {

                //el usuario ya existe

                $data = array(
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'usuario ya existe',
                );

            }
        } else {
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'usuario no creado',
            );
        }
        return response()->json($data, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cuidador  $cuidador
     * @return \Illuminate\Http\Response
     */
    public function show(cuidador $cuidador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cuidador  $cuidador
     * @return \Illuminate\Http\Response
     */
    /*public function edit(cuidador $cuidador)
    {
    //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cuidador  $cuidador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuidador $cuidador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cuidador  $cuidador
     * @return \Illuminate\Http\Response
     */
    public function destroy(cuidador $cuidador)
    {
        //
    }
}
