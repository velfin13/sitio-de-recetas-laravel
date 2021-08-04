@extends('layouts.app')

@section('content')
    <article class="contenido-receta bg-white shadow p-4">
        <h1 class="text-center mb-4">{{ $recetas->titulo }}</h1>

        {{-- imagen de la receta --}}
        <div class="imagen-receta">
            <img src="/storage/{{ $recetas->imagen }}" alt="img" class="w-100">
        </div>

        {{-- autor y categoria ingredientes preparacion fecha --}}
        <div class="receta-meta">
            <p>
                <span class="font-weight-bold text-primary">Categoria:</span>
                {{ $recetas->categoria->nombre }}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>

                <a href="{{ route('perfiles.show', ['perfil' => $recetas->autor->id]) }}"> {{ $recetas->autor->name }}</a>
            </p>

            <p>
                <span class="font-weight-bold text-primary">Fecha:</span>

                @php
                    $fecha = $recetas->created_at;
                @endphp

                <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
            </p>


            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes:</h2>
                {!! $recetas->ingredientes !!}
            </div>

            <div class="ingredientes">
                <h2 class="my-3 text-primary">Preparacion:</h2>
                {!! $recetas->preparacion !!}
            </div>

            <div class="justify-content-center row text-center">
                <like-button likes="{{ $likes }}" like="{{ $like }}" receta-id="{{ $recetas->id }}">
                </like-button>
            </div>
            
            <div class="d-flex align-items-start">
                <calificacion-button></calificacion-button>
            </div>








        </div>
    </article>
@endsection
