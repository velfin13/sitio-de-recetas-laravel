<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Comment;
use App\Receta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;



class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search', 'countRecetas']]);
    }


    public function index()
    {
        //recetas con paginacion
        $usuario = auth()->user();


        $recetas = Receta::all()->where('user_id', $usuario->id);


        return view('recetas.index')->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //obtener categorias sin modelo
        // $categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');
        $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validacion
        $data = request()->validate([
            'titulo' => 'required|min:3',
            'categoria' => 'required',
            'preparacion' => 'required|min:8',
            'url' => 'nullable|url',
            'ingredientes' => 'required|min:8',
            'imagen' => 'required|image|mimes:jpeg,jpg,svg,png',
        ]);

        //obtener ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        //redimencionar la imagen
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();



        /* corregir url  del video*/
        if ($request['url']) {

            $check_url = explode("/", $data['url']);

            if ($check_url[2] == "www.youtube.com") {
                $parametro = explode("?", $check_url[3]);

                if ($parametro[0] == "watch") {
                    $nuevo_parametro = explode("=", $parametro[1]);

                    $url_corregida = "https://www.youtube.com/embed/" . $nuevo_parametro[1];
                }
            } else if ($check_url[2] == "youtu.be") {
                $parametro = $check_url[3];
                $url_corregida = "https://www.youtube.com/embed/" . $parametro;
            } else {
                $url_corregida = $data["url"];
            }
        } else {
            $url_corregida = null;
        }



        /* insertando receta a la base de datos (sin modelo) */
        /* DB::table('recetas')->insert([
            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'user_id' => Auth::user()->id,
            'categoria_id' => $data['categoria']
        ]); */

        /* insertando receta a la base de datos (con modelo) */
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'url' => $url_corregida,
            'imagen' => $ruta_imagen,
            'user_id' => Auth::user()->id,
            'categoria_id' => $data['categoria']
        ]);


        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {


        $comentarios =  Receta::find($receta->id)->comentario()->orderBy('created_at', 'desc')->paginate(5);

        //obtener si el usuario actual esta autenticado y le gusta la receta
        $like = (auth()->user()) ? auth()->user()->meGusta->contains($receta->id) : false;

        //pasar cantidad de likes a la vista
        $likes = $receta->likes->count();

        return view('recetas.show')
            ->with('recetas', $receta)
            ->with('like', $like)
            ->with('likes', $likes)
            ->with('comentarios', $comentarios);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //revisa el policy
        $this->authorize('view', $receta);

        $categorias = CategoriaReceta::all(['id', 'nombre']);
        return view('recetas.edit')
            ->with('categorias', $categorias)
            ->with('receta', $receta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //revisa el policy
        $this->authorize('update', $receta);


        $data = request()->validate([
            'titulo' => 'required|min:3',
            'categoria' => 'required',
            'preparacion' => 'required|min:8',
            'url' => 'nullable|url',
            'ingredientes' => 'required|min:8',
            'imagen' => 'image|mimes:jpeg,jpg,svg,png',
        ]);

        /* corregir url  del video*/
        if ($request['url']) {

            $check_url = explode("/", $data['url']);


            if ($check_url[2] == "www.youtube.com") {
                $parametro = explode("?", $check_url[3]);

                if ($parametro[0] == "watch") {
                    $nuevo_parametro = explode("=", $parametro[1]);

                    $url_corregida = "https://www.youtube.com/embed/" . $nuevo_parametro[1];
                } else if ($parametro[0] == "embed") {
                    $url_corregida = $request['url'];
                } else {
                    $url_corregida = null;
                }
            } else if ($check_url[2] == "youtu.be") {
                $parametro = $check_url[3];
                $url_corregida = "https://www.youtube.com/embed/" . $parametro;
            } else {
                $url_corregida = $data["url"];
            }
        } else {
            $url_corregida = null;
        }




        $receta->titulo = $data['titulo'];
        $receta->url = $url_corregida;
        $receta->categoria_id = $data['categoria'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->preparacion = $data['preparacion'];

        //si se cambia la imagen
        if (request('imagen')) {
            //obtener ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

            //redimencionar la imagen
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            //la guardamos
            $img->save();

            $receta->imagen = $ruta_imagen;
        }


        $receta->save();

        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //revisa el policy
        $this->authorize('delete', $receta);
        $receta->delete();

        return redirect()->action('RecetaController@index');
    }





    public function search(Request $request)
    {
        $busqueda = $request['buscar'];

        $recetas = Receta::where('titulo', 'like', '%' . $busqueda . '%')->paginate(6);
        $recetas->appends(['buscar' => $busqueda]);

        return view('busquedas.show', compact('recetas', 'busqueda'));
    }

    public function countRecetas(User $user)
    {
        return count($user->recetas);
    }
}
