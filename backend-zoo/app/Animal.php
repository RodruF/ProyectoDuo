<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
      'idCuidador' , 'especie' , 'nombre', 'descripcion', 'año', 'image'
    ];
   
     public function cuidador(){
        return $this->belongsTo("App\Cuidador","id");
    }
   
}
