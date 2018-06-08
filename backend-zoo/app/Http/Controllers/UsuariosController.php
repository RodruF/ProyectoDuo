<?php

namespace App\Http\Controllers;

use App\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Helpers\JwtAuth;
class UsuariosController extends Controller
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
        $role = "usuarios";

        if (!is_null($email) && !is_null($password) && !is_null($name)) {
            // crear cuidador
            $usuarios = new Usuarios();
            $usuarios->email = $email;
            $usuarios->name = $name;
            $usuarios->apellido = $apellido;
            $usuarios->role = $role;


            $pwd = hash('sha256', $password);
            $usuarios->password = $pwd;

            //comprobar usuario duplicado
            $isset_usuarios = [Usuarios::where('email', '=', $email)->first()];

            if (count($isset_usuarios) > 0) {
                //guardar usuario
                $usuarios->save();
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

    public function login(Request $request){
        $jwtAuth = new JwtAuth();
        //recibir post
        $json = $request->input('json', null);
        $params = json_decode($json);

        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $password  = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $getToken =  (!is_null($json) && isset($params->gettoken)) ? $params->gettoken : null;
    
        //cifrar contraseña
        $pwd = hash('sha256', $password);
        if(!is_null($email) && !is_null($password) && ($getToken == null || $getToken == 'false')){
            $signup= $jwtAuth->signup($email, $pwd);

        }elseif($getToken != null){
          
            $signup = $jwtAuth->signup($email,$pwd,$getToken);
          
        }else{
            $signup = array(
                'status' => 'error',
                'message'=> 'envia tus datos por post'
            );
        }
        return response()->json($signup, 200);

    
    }

    //cifrar contraseña



    /**
     * Display the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(usuarios $usuarios)
    {
        //
    }
}
