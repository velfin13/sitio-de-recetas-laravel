<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Receta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show','getPerfil']]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'receta_id' => 'required',
            'comentario' => 'required',
        ]);


        $nuevoComentario = new Comment;
        $nuevoComentario->user_id = $request['user_id'];
        $nuevoComentario->receta_id = $request['receta_id'];
        $nuevoComentario->comentario = $request['comentario'];

        $nuevoComentario->save();
        return redirect()->route('recetas.show', ['receta' => $request['receta_id']]);
    }


    public function show(User $user)
    {
        return $user;
    }

    public function getPerfil(User $user)
    {
        
        return $user->perfil;
    }


    public function destroy(Comment $comment)
    {
        return $comment->delete();
    }
}
