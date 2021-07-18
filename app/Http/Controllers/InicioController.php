<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        // $nuevas = Receta::orderBy('created_at','ASC')->get();
        $nuevas = Receta::latest()->limit(20)->get();

        //obtener todas las categorias
        $categorias = CategoriaReceta::all();

        //agrupar recetas por categoria
        $recetas = [];
        foreach ($categorias as $categoria) {
            $recetas[Str::slug($categoria->nombre)][] = Receta::where('categoria_id', $categoria->id)->limit(5)->get();
        }

        return view('inicio.index', compact('nuevas','recetas'));
    }
}
