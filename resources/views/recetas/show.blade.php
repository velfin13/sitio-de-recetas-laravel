@extends('layouts.app')


@section('content')
    <article class="contenido-receta bg-white shadow p-4">
        <h1 class="text-center mb-4">{{ Str::title($recetas->titulo) }}</h1>


        <div class="row">
            <div class="col-8 col-sm-8 col-md-9 col-xl-10"></div>
            <div class="col-4 col-sm-4 col-md-3 col-xl-2 mb-4">
                <a target="_blank" href="{{ route('pdfs.index', ['receta' => $recetas->id]) }}"
                    class="btn btn-outline-success font-weight-bold">Descargar <i class="fa fa-download"
                        aria-hidden="true"></i></a>
            </div>
        </div>

        {{-- imagen de la receta --}}
        <div class="imagen-receta row">
            <div class="col-12">
                <center><img src="/storage/{{ $recetas->imagen }}" alt="img" class="w-75 mb-4"
                        style="border-radius: 40px;box-shadow: 7px 10px 28px -4px rgba(0,0,0,0.75);"></center>
            </div>
        </div>

        {{-- boton me gusta --}}
        <div class="text-center">
            <like-button likes="{{ $likes }}" like="{{ $like }}" receta-id="{{ $recetas->id }}">
            </like-button>
        </div>


        {{-- autor y categoria ingredientes preparacion fecha --}}
        <div class="receta-meta">
            <p>
                <span class="font-weight-bold text-primary">Categoria:</span>
                {{ $recetas->categoria->nombre }}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>

                <a href="{{ route('perfiles.show', ['perfil' => $recetas->autor->id]) }}" class="enlace-autor">
                    {{ $recetas->autor->name }}</a>
            </p>

            <p>
                <span class="font-weight-bold text-primary">Publicado el:</span>

                @php
                    $fecha = $recetas->created_at;
                @endphp

                <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
            </p>


            <div class="ingredientes">
                <h2 class="my-3 text-primary text-center font-weight-bold">INGREDIENTES:</h2>
                {!! $recetas->ingredientes !!}
            </div>

            <div class="ingredientes">
                <h2 class="my-3 text-primary text-center font-weight-bold">PREPARACIÓN:</h2>
                {!! $recetas->preparacion !!}
            </div>


            {{-- aqui va el video --}}

            @if ($recetas->url)
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item" src="{{ $recetas->url }}"></iframe>
                </div>
            @endif



            <div class="d-flex align-items-start">
                <calificacion-button></calificacion-button>
            </div>


        </div>
    </article>
@endsection
