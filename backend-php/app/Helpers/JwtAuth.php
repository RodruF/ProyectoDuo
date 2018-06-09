<?php
namespace App\Helpers;

use App\usuario;
use Firebase\JWT\JWT;

class JwtAuth
{

    public $key;

    public function _construct()
    {
        $this->$key = 'duoprogramadores_2018_si_se_puede';
    }
    public function signup($email, $password, $getToken = null)
    {

        $user = usuario::where(
            array(
                'email' => $email,
                'password' => $password,
            ))->first();
        /*$cuidador = cuidador::where(
        array(
        'correo' => $email,
        'password' => $password,
        ))->first();
        $admin = array(
        'admin' => $email,
        'admin' => $password,
        );*/
        $signup = false;
        if (is_object($user)) { //|| is_object($cuidador) || is_object($admin)) {
            $signup = true;
        }
        if ($signup) {
            $token = array(
                'sub' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'apellido' => $user->apellido,
                'iat' => time(),
                'exp' => time() + (120),
            );
            $jwt = JWT::encode($token, $this->key, 'HS256');
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));
            if (is_null($getToken)) {
                return $jwt;
            } else {
                return $decoded;
            }

            /*} else if ($signup && is_object($cuidador)) {
        $token = array(
        'sub' => $cuidador->id,
        'correo' => $cuidador->correo,
        'name' => $user->name,
        'apellido' => $user->apellido,
        'iat' => time(),
        'exp' => time() + (120),
        );
        $jwt = JWT::encode($token, $this->key, 'HS256');
        $decoded = JWT::decode($jwt, $this->key, array('HS256'));
        if (!is_null($getToken)) {
        return $jwt;
        } else {
        return $decoded;
        }

        } else if ($signup && is_object($admin)) {
        $token = array(
        'sub' => $cuidador->id,
        'correo' => $cuidador->correo,
        'iat' => time(),
        'exp' => time() + (120),
        );
        $jwt = JWT::encode($token, $this->key, 'HS256');
        $decoded = JWT::decode($jwt, $this->key, array('HS256'));
        if (!is_null($getToken)) {
        return $jwt;
        } else {
        return $decoded;
        }*/

        } else {
            return array('status' => 'error', 'message' => 'login ha fallado');
        }
    }
    public function checkToken($jwt, $getIdentity = false)
    {
        $auth = false;
        try {
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));
        } catch (\UnexpectedValueException $e) {
            $auth = false;
        } catch (\DomainException $e) {
            $auth = false;
        }
        if (is_object($decoded) && isset($decoded->sub)) {
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
