@extends('layouts.app')


@section('content')
    <article class="contenido-receta bg-white shadow p-4">
        <h1 class="text-center mb-4">{{ Str::title($recetas->titulo) }}</h1>


        <div class="row">
            <div class="col-8 col-sm-8 col-md-9 col-xl-10"></div>
            <div class="col-4 col-sm-4 col-md-3 col-xl-2 mb-4">
                <a target="_blank" href="{{ route('pdfs.index', ['receta' => $recetas->id]) }}"
                    class="btn btn-primary font-weight-bold">Descargar <i class="fa fa-download" aria-hidden="true"></i></a>
            </div>
        </div>

        {{-- imagen de la receta --}}
        <div class="imagen-receta row">
            <div class="col-12">
                <center><img src="/storage/{{ $recetas->imagen }}" alt="img" class="w-75 mb-4"
                        style="border-radius: 40px;box-shadow: 3px 9px 25px 1px rgba(6,6,5,0.36);"></center>
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
                <h2 class="my-4 text-primary text-center font-weight-bold">INGREDIENTES:</h2>
                {!! $recetas->ingredientes !!}
            </div>

            <div class="ingredientes">
                <h2 class="my-4 text-primary text-center font-weight-bold">PREPARACIÓN:</h2>
                {!! $recetas->preparacion !!}
            </div>


            {{-- aqui va el video --}}

            @if ($recetas->url)
                @php
                    $dato = explode('/', $recetas->url);
                @endphp
                @if ($dato[2] == 'www.youtube.com')
                    <div class="embed-responsive embed-responsive-21by9 mt-5 mb-5">
                        <iframe class="embed-responsive-item" src="{{ $recetas->url }}"></iframe>
                    </div>
                @endif
            @endif



            <div class="d-flex align-items-start">
                @auth
                    <calificacion-button id-user={{ Auth::user()->id }} id-receta={{ $recetas->id }}>
                    </calificacion-button>
                @else
                    <calificacion-button id-user={{ 'null' }} id-receta={{ $recetas->id }}></calificacion-button>

                @endauth
            </div>


            {{-- comentarios --}}
            <div class="container mt-4">
                <div class="row comments justify-content-center">
                    <div class="col-6">
                        @auth
                            <form action="{{ route('comment.store') }}"
                                class="form-comments d-flex justify-content-end flex-wrap" method="POST">
                                @csrf
                                {{-- comentario --}}
                                @error('comentario')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <div class="alert alert-danger text-center" role="alert">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                                <textarea type="text" value="{{ old('comentario') }}" name="comentario"
                                    class="@error('comentario') is-invalid @enderror"
                                    placeholder="Ingresa tu comentario"></textarea>

                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $recetas->id }}" name="receta_id">

                                <button type="submit" class="btn btn-primary">Comentar <i class="fa fa-paper-plane"
                                        aria-hidden="true"></i></button>
                            </form>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Para poder comentar debes <b><a href="{{ route('login') }}">Iniciar sesión</a></b>
                            </div>

                        @endauth
                        @foreach ($comentarios as $item)
                            <hr>
                            <div class="row">
                                <div class="media">
                                    <img src="http://pm1.narvii.com/6891/2952708408bd0f14b8e9678b3be71463e5c4b3bfr1-1181-1175v2_uhq.jpg"
                                        width="64" height="64" alt="" />
                                    <div class="media-body">
                                        <p class="user">
                                            <a href="{{ route('perfiles.show', ['perfil' => $item->user_id]) }}">
                                                <comentario-nombre id-user={{ $item->user_id }}></comentario-nombre>
                                            </a>
                                            @php
                                                $fecha = $item->created_at;
                                            @endphp
                                            <span>
                                                <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
                                            </span>
                                        </p>
                                        <p class="comment">
                                            {{ $item->comentario }}
                                        </p>
                                        <div class="buttons text-right">
                                            @auth
                                                @if (Auth::user()->id == $item->user_id)
                                                    <eliminar-comentario id-comentario={{ $item->id }}
                                                        id-receta={{ $item->receta_id }}>
                                                    </eliminar-comentario>
                                                @endif

                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center">
                            {{ $comentarios->links() }}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </article>
@endsection
