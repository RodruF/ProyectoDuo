<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    protected $fillable = ['nombre', 'descripcion','año','image'];

    public function jaula(){
        return $this->belongsTo('App\jaula','idJaula');
    }
      public function especie(){
        return $this->belongsTo('App\especie','idEspecie');
    }
}
