<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\helpers\JwtAuth;
use App\usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $name = (!is_null($json) && isset($params->name)) ? $params->name : null;
        $apellido = (!is_null($json) && isset($params->apellido)) ? $params->apellido : null;
        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $role = 'usuario';

        if (!is_null($email) && !is_null($password) && !is_null($name)) {
            // crear usuario
            $user = new usuario();
            $user->email = $email;
            $user->name = $name;
            $user->apellido = $apellido;
            $user->role = $role;

            $pwd = hash('sha256', $password);
            $user->password = $pwd;

            //comprobar usuario duplicado
            $isset_cuidador = [usuario::where('email', '=', $email)->first()];

            if (count($isset_cuidador) == 0) {
                //guardar usuario
                $user->save();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     public function login(Request $request){

        $jwtAuth = new JwtAuth();

        //recibir post
        $json = $request->input('json', null);
        $params = json_decode($json);

        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $gettoken = (!is_null($json) && isset($params->gettoken)) ? $params->gettoken : true;

        //cifrar la password
        $pwd = hash('sha256' , $password);
        if(!is_null($email) && !is_null($password)){
            $signup = $jwtAuth->signup($email,$pwd);
            return response()->json($signup, 200);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function edit($id)
    {
    //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
