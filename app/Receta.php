<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Receta extends Model
{

    protected $fillable = [
        'titulo', 'ingredientes', 'url', 'preparacion', 'imagen', 'user_id', 'categoria_id'
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

    //likes que ha recibido la receta
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }

    //comentarios que ha recibido la receta
    public function comment()
    {
        return $this->belongsToMany(User::class, 'comment_receta');
    }
}
