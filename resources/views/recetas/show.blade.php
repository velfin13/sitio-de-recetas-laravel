@extends('layouts.app')

@section('content')
<div id="recipe-detail" class="container-fluid">
    <div class="title-and-like" style="display: flex;flex-direction: row; justify-content: space-between;">
        <h2 class="subtitle"><b>🧾 {{Str::title($recetas->titulo)}}</b></h2>
        <div id="actions" style="display: flex; flex-direction: row; align-items: center;">
            <a target="_blank" href="{{route('pdfs.index',['receta'=> $recetas->id])}}"><span class="download-button" style="font-size: 20px;"><i class="fas fa-download"></i></span></a>
            <like-button likes="{{ $likes }}" like="{{ $like }}" receta-id="{{ $recetas->id }}">
            </like-button>
        </div>
    </div>
    <hr class="divider">

    <section id="multimedia">
        <div class="row">
            <div class="image-wrapper col-12 col-sm-12 col-md-6 col-xl-6">
                <img src="/storage/{{ $recetas->imagen }}" alt="img">
            </div>
            <div class="video-wrapper col-12 col-sm-12 col-md-6 col-xl-6">
                @if($recetas->url === null)
                <div class="empty-video">
                    <i class="fas fa-video"></i>
                </div>
                @else
                <iframe src="{{ $recetas->url }}"></iframe>
                @endif
            </div>
        </div>
    </section>

    <section id="chef">
        <h3><b>🧑‍🍳 Chef</b></h3>
        <hr class="divider" style="width: 200px;">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                <h5><b>Nombres</b></h5>
                {{ $recetas->autor->name }}
            </div>
        </div>
    </section>

    <section id="recipe">
        <h3><b>📕 Receta</b></h3>
        <hr class="divider" style="width: 200px;">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                <h5><b>Fecha</b></h5>
                <p>{{date('d-m-Y', strtotime($recetas->created_at))}}</p>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                <h5><b>Categoria</b></h5>
                <p>{{ $recetas->categoria->nombre }}</p>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                <h5><b>Ingredientes</b></h5>
                <p>{!! $recetas->ingredientes !!}</p>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                <h5><b>Preparación</b></h5>
                <p>{!! $recetas->preparacion !!}</p>
            </div>
        </div>
    </section>

    <section id="stars">
        <h3><b>🥇Puntuación</b></h3>
        <hr class="divider" style="width: 200px;">

        <div class="row">
            <div class="col-12">
                @auth
                <calificacion-button id-user={{ Auth::user()->id }} id-receta={{ $recetas->id }}>
                </calificacion-button>
                @else
                <calificacion-button id-user={{ 'null' }} id-receta={{ $recetas->id }}></calificacion-button>
                @endauth
            </div>
        </div>
    </section>

    <section id="comments">
        <h3><b>📢 Comentarios</b></h3>
        <hr class="divider" style="width: 200px;">

        <!-- FORM -->
        <div id="comment-form">
            <form action="{{route('comment.store')}}" method="POST">
                <div class="form-wrapper">
                    <div class="left">
                        @auth
                        @csrf
                        @error('comentario')
                        <span class="invalid-feedback d-block" role="alert">
                            <div class="alert alert-danger text-center" role="alert">
                                {{ $message }}
                            </div>
                        </span>
                        @enderror

                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <input type="hidden" value="{{ $recetas->id }}" name="receta_id">

                        <input type="text" rows="1" value="{{ old('comentario') }}" name="comentario" class="form-control" placeholder="¿Que opinas acerca esta receta? 🤔"></input>

                        @else
                        <h1>Para comentar debes inciar sesion</h1>
                        @endauth
                    </div>

                    <div class="right">
                        <button type="submit" class="btn btn-light"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>

        </div>
        <!-- END FORM -->

        <!-- COMMENTS -->
        <div id="comment-list" class="row">
            @if(count($comentarios) === 0)
            <p class="alert alert-warning text-center"><b>Esta receta aun no tiene comentarios, ¿Quieres dejar un comentario acerca "{{Str::title($recetas->titulo)}}" 🧐?</b></p>
            @else
            <div class="comments">
                @foreach ($comentarios as $item)
                <div class="comment-item col-12">
                    <div class="left">
                        <foto-perfil id-user={{ $item->user_id }}></foto-perfil>
                    </div>
                    <div class="right">
                        <div class="top">
                            <span class="name"><b>
                                    <comentario-nombre id-user={{ $item->user_id }}></comentario-nombre>
                                </b></span>
                            <div style="display:flex;align-items:center"><i class="far fa-calendar-alt date-icon"></i><span class="date">{{date('d-m-Y', strtotime($item->created_at))}}</span></div>

                        </div>
                        <div class="body">
                            {{ $item->comentario }}
                        </div>
                        <div class="bottom">
                            @auth
                            @if (Auth::user()->id == $item->user_id)
                            <eliminar-comentario id-comentario={{ $item->id }} id-receta={{ $item->receta_id }}>
                            </eliminar-comentario>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <!-- END COMMENTS -->
    </section>

</div>
@endsection