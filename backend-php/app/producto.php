<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $fillable = ['image', 'descrpcion','nombre','precio','stock'];
}
