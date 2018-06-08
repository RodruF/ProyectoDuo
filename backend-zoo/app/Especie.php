<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $fillable = [
     'nombre', 'descripcion'
    ];
}
