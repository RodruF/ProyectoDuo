<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Helpers\JwtAuth;
use Illuminate\Http\Request;
use App\Http\Requests;
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
        /*$hash = $request->header('Authorization', null);
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth->checkToken($hash);

        if ($checkToken) {
            echo "bien";die();
        } else {
            echo "mal";die();
        }*/
        $animales = Animal::all();
        $response = Response::json($animales, 200);
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
            if((!$request->nombre)||(!$request->descripcion)||(!$request->año)){
                $response = Response::json([
                    'message' => 'por favor escriba todos los campos requeridos'
                ],422);
            }

            $animales = new Animal(array(
                'nombre' => trim($request->nombre),
                'descripcion' => trim($request->descripcion),
                'año' => 5
            ));
            $animales->save();
            $message = 'animal agregado';

            $response = Response::json([
                'message' => $message,
                'data' => $animales,
            ],200);
        }else{
             $data = array(
                'message' => 'Login incorrecto',
                'status' => 'error',
                'code' => 400,
            );
        }
        return $response;
        //     //recoger datos por post
        //     $json = $request->input('json', null);
        //     $params = json_decode($json);
        //     $params_array = json_decode($json, true);

        //     //usuario autenticado
        //     $usuario = $jwtAuth->checkToken($hash, true);

        //     //validacion
        //     $request->merge($params_array);
        //     try{
        //     $validate = $this->validate($request, [
        //         'nombre' => 'required|min:5',
        //         'description' => 'required',
        //         'año' => 'required'
        //         //'image' => 'required',
        //         /*'idEspecie' => 'required',
        //         'idJaula' => 'required',*/
        //     ]);
        //     var_dum($validate);die();
        //     }catch(\Illuminate\Validation\ValidationException $e){
        //         return $e->getResponse();
        //     }
        //     //guardar animal

        //     $animal = new Animal();
        //    // $animal->idCuidador = '1'; //$usuario->sub;
        //     $animal->nombre = $params->nombre;
        //     $animal->descripcion = $params->description;
        //     $animal->año = $params->año;
        //     /*$animal->image = null; //$params->image;
        //     $animal->idEspecie = '1';
        //     $animal->idJaula = '1';*/
        //     $animal->save();

        //     $data = array(
        //         'animal' => $animal,
        //         'status' => 'success',
        //         'code' => 200,
        //     );

        // } else {
        //     //devolver error
        //     $data = array(
        //         'message' => 'Login incorrecto',
        //         'status' => 'error',
        //         'code' => 400,
        //     );

        // }
        // return response()->json($data, 200);
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
