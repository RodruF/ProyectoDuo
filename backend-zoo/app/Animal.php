<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'año', 'image'
    ];
    public function especie(){
        return $this->belongsTo("App\Especie","id");
        
    }
    public function jaula(){
        return $this->belongsTo("App\Jaula","id");
    }
}
