<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\helpers\JwtAuth;
use App\usuario;
use App\cuidador;


class LoginController extends Controller
{
    
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
}
