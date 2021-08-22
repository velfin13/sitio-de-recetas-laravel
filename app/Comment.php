<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'receta_id', 'comentario'
    ];

    //obtener infromacion del usuario via FK
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
