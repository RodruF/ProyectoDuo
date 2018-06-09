<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuidador extends Model
{
    protected $fillable = ['role','nombre', 'especialidad','apellido','correo','password','image'];

      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
