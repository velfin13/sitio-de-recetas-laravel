<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Rating;
use App\Http\Resources\Rating as RatingResource;


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
        $this->middleware('auth', ['except' => ['show','search']]);
    }


    public function index()
    {
        //recetas con paginacion
        $usuario = auth()->user();


        $recetas = Receta::where('user_id', $usuario->id)->paginate(4);


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
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image|mimes:jpeg,jpg,svg,png',
        ]);

        //obtener ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        //redimencionar la imagen
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();

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
        //obtener si el usuario actual esta autenticado y le gusta la receta
        $like = (auth()->user()) ? auth()->user()->meGusta->contains($receta->id) : false;

        //pasar cantidad de likes a la vista
        $likes = $receta->likes->count();

        return view('recetas.show')
            ->with('recetas', $receta)
            ->with('like', $like)
            ->with('likes', $likes);
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
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'image|mimes:jpeg,jpg,svg,png',
        ]);

        $receta->titulo = $data['titulo'];
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


    public function setrating(Request $request){
        return new RatingResource(Rating::create([
            'receta_id' => $request->get('recetas'),
            'user_id' => $request->get('user'),
            'rating' => $request->get('rating')
        ]));
    }

    public function getrating($id){
        return RatingResource::collection(Rating::all()->where('receta_id', $id));
    }

    public function search(Request $request)
    {
        $busqueda = $request['buscar'];

        $recetas = Receta::where('titulo', 'like', '%' . $busqueda . '%')->paginate(6);
        $recetas->appends(['buscar' => $busqueda]);

        return view('busquedas.show', compact('recetas', 'busqueda'));
    }
}
