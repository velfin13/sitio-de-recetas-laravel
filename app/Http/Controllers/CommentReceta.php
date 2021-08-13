<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentReceta extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getComentarios']]);
    }


    public function store(Request $request)
    {
        $data = request();
        DB::table('comment_receta')->insert([
            'user_id' => $data['idUser'],
            'receta_id' => $data['idReceta'],
            'comentario' => $data['comentario'],

        ]);

        return  redirect()->route('recetas.show', ["receta" => $data['idReceta']]);
    }

    public function getComentarios()
    {
    }


    public function update(Request $request, Receta $receta)
    {
        //
    }


    public function destroy(Receta $receta)
    {
        //
    }
}
