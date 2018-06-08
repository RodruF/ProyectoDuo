<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jaula extends Model
{
   protected $fillable = [
     'nombre', 'descripcion','image'
    ];
    
    public function especie(){
        return $this->belongsTo("App\Especie","id");
    }
}
