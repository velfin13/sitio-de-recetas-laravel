<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    public function show(Perfil $perfil)
    {
        //recetas con paginacion
        $recetas = Receta::where('user_id', $perfil->user_id)->paginate(6);

        return view('perfiles.show')
            ->with('perfil', $perfil)
            ->with('recetas', $recetas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $this->authorize('view', $perfil);
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        $this->authorize('update', $perfil);


        //validar
        $data = request()->validate([
            'nombre' => 'required',
            'url' => 'nullable|url',
            'biografia' => 'required',
            'imagen' => 'image|mimes:jpeg,jpg,svg,png',
        ]);


        //si usuario sube imagen
        if ($request['imagen']) {
            //obtener ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');

            //redimencionar la imagen
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(600, 600);
            $img->save();

            $arayImagen = ['imagen' => $ruta_imagen];
        }


        //asiganar y guardar nombre y url
        auth()->user()->url = $data['url'];
        auth()->user()->name = $data['nombre'];
        auth()->user()->save();

        //eliminar url y name de $data
        unset($data['nombre']);
        unset($data['url']);

        //asignar y guardar biografia
        auth()->user()->perfil()->update(
            array_merge($data, $arayImagen ?? [])
        );
        //redireccionar

        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
