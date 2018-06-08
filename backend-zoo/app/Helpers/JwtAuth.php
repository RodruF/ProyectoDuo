<?php
namespace App\helpers;

use App\usuarios;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;

class JwtAuth
{
    public $clave = 'douprogramadores2018si-se-pued' ;

    public function _construct()
    {
        $this->clave = 'douprogramadores2018si-se-pued';
    }
    

    public function signup($email, $password, $getToken = null)
    {

        $usuario = usuarios::where(
            array(
                'email' => $email,
                'password' => $password,
            )) -> first();

        $signup = false;
        if (is_object($usuario)) {
            $signup = true;
        }
        if ($signup) {
            //generar el token y devolverlo
            $token = array(
                'sub' => $usuario->id,
                'email' => $usuario->email,
                'name' => $usuario->name,
                'surname' => $usuario->apellido,
                'iat' => time(),
                'exp' => time() + (24*60*60)
            );
            $jwt = JWT::encode($token, $this->clave, 'HS256');
            $decoded = JWT::decode($jwt, $this->clave, array('HS256'));

            if (is_null($getToken)) {
                return $jwt;
            } else {
                return $decoded;
            }
        } else {
            //devolvera un error
            return array('status' => 'error', 'message' => 'login ha fallado');
        }
    }

    public function checkToken($jwt, $getIdentity = false)
    {
        $auth = false;
        try {
            $decoded = JWT::decode($jwt, $this->clave, array('HS256'));
        } catch (\UnexpectedValueException $e) {
            $auth = false;
        } catch (\DomainException $e) {
            $auth = false;
        }
        if (isset($decoded) && is_object($decoded) && isset($decoded->sub)) {
            $auth = true;
        } else {
            $auth = false;
        }

        if ($getIdentity) {
            return $decoded;
        }

        return $auth;
    }
}
