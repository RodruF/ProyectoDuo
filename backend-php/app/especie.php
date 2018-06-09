<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class especie extends Model
{
    protected $fillable = ['nombre', 'descripcion','image'];
    
      public function jaula(){
        return $this->belongsTo('App\jaula','idJaula');
    }
}
