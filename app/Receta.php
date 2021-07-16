<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Receta extends Model
{

    protected $fillable = [
        'titulo', 'ingredientes', 'preparacion', 'imagen', 'user_id', 'categoria_id'
    ];

    //obtiene la categoria de la receta via FK
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }

    //obtener infromacion del usuario via FK
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
