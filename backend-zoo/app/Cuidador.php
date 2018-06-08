<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
     protected $fillable = [
        'role','name', 'apellido','email','image'
    ];
     protected $hidden = [
        'password', 'remember_token',
    ];
}
