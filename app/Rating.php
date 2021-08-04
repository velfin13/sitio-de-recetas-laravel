<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillabe =[
        'receta_id', 'user_id','rating'
    ];
}
