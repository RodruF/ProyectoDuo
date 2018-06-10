<?php

namespace App\Http\Controllers;

use App\Cuidador;
use App\Helpers\JwtAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CuidadorController extends Controller
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
            $cuidador = Cuidador::all();
            $response = Response::json($cuidador, 200);
            return $response;

        } else {
            $data = array(
                'message' => 'autenticacion incorrecta',
                'status' => 'error',
                'code' => 400);
        }

        return response()->json($data, 200);
    }
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

        $name = (!is_null($json) && isset($params->name)) ? $params->name : null;
        $apellido = (!is_null($json) && isset($params->apellido)) ? $params->apellido : null;
        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;

        if (!is_null($email) && !is_null($password) && !is_null($name)) {
            // crear cuidador
            $cuidador = new Cuidador();
            $cuidador->role = 'cuidador';
            $cuidador->email = $email;
            $cuidador->name = $name;
            $cuidador->apellido = $apellido;

            $pwd = hash('sha256', $password);
            $cuidador->password = $pwd;

            //comprobar usuario duplicado
            $isset_cuidador = [Cuidador::where('email', '=', $email)->first()];

            if (count($isset_cuidador) > 0) {
                //guardar usuario
                $cuidador->save();
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'cuidador creado',
                );

            } else {
                //el usuario ya existe
                $data = array(
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'cuidador ya existe',
                );

            }
        } else {
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'cuidador no creado',
            );
        }
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuidador  $cuidador
     * @return \Illuminate\Http\Response
     */
    public function show(Cuidador $cuidador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuidador  $cuidador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuidador $cuidador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuidador  $cuidador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuidador $cuidador)
    {
        //
    }
}
