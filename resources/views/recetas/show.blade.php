@extends('layouts.app')


@section('styles')
<link rel="stylesheet" href="{{asset('plugins/emoji-area/dist/emojionearea.min.css')}}">
<script type="text/javascript" src="{{asset('plugins/emoji-area/dist/emojionearea.min.js')}}"></script>
@endsection

@section('content')
<div id="recipe-detail" class="container-fluid">
    <div class="title-and-like" style="display: flex;flex-direction: row; justify-content: space-between;">
        <h2 class="subtitle"><b>🧾 {{ Str::title($recetas->titulo) }}</b></h2>
        <div id="actions" style="display: flex; flex-direction: row; align-items: center;">
            <a target="_blank" href="{{ route('pdfs.index', ['receta' => $recetas->id]) }}"><span class="download-button" style="font-size: 24px;"><i class="far fa-download"></i></span></a>
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
                @if ($recetas->url === null)
                <div class="empty-video">
                    <i class="fas fa-video"></i>
                </div>
                @else
                <iframe allow="fullscreen;" src="{{ $recetas->url }}"></iframe>
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
                <a href="{{ route('perfiles.show', ['perfil' => $recetas->user_id]) }}">{{ $recetas->autor->name }}</a>
            </div>
        </div>
    </section>

    <section id="recipe">
        <h3><b>📕 Receta</b></h3>
        <hr class="divider" style="width: 200px;">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                <h5><b>Fecha</b></h5>
                <p>{{ date('d-m-Y', strtotime($recetas->created_at)) }}</p>
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
            <form action="{{ route('comment.store') }}" method="POST">
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

                        <input id="comment-input" type="text" maxlength="200" rows="1" value="{{ old('comentario') }}" name="comentario" class="form-control question" placeholder="¿Que opinas acerca esta receta? 🤔"></input>

                        @else
                        <h1>Para comentar debes inciar sesion</h1>
                        @endauth
                    </div>

                    <div class="right">
                        <button type="submit" class="btn btn-light"><i class="far fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>

        </div>
        <!-- END FORM -->

        <!-- COMMENTS -->
        <div id="comment-list" class="row">
            @if (count($comentarios) === 0)
            <p class="alert alert-warning text-center"><b>Esta receta aun no tiene comentarios, ¿Quieres dejar un
                    comentario acerca "{{ Str::title($recetas->titulo) }}" 🧐?</b></p>
            @else
            <div class="comments">
                @foreach ($comentarios as $item)
                <!-- COMMENT -->
                <div class="comment-item col-12">
                    <div class="left">
                        <foto-perfil id-user={{ $item->user_id }}></foto-perfil>
                    </div>
                    <div class="right">
                        <!-- TOP -->
                        <div class="top">
                            <span class="name">
                                <comentario-nombre id-user={{ $item->user_id }}></comentario-nombre>
                            </span>
                            <span style="display: flex; align-items: center;">{{ date('d-m-Y', strtotime($item->created_at)) }} <i class="fas fa-circle" style="font-size: 8px; margin-left: 5px; margin-right: 5px;"></i>
                                <local-date date="{{$item->created_at}}"></local-date>
                            </span>
                        </div>
                        <!-- BODY -->
                        <div class="body">
                            {{ $item->comentario }}
                        </div>
                        <!-- BOTTOM -->
                        <div class="bottom">
                            @auth
                            @if (Auth::user()->id == $item->user_id)
                            <eliminar-comentario id-comentario={{ $item->id }} id-receta={{ $item->receta_id }}></eliminar-comentario>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
                <!-- END COMMENT -->
                @endforeach
            </div>
            @endif
        </div>
        <!-- END COMMENTS -->
    </section>

    <!-- <textarea id="example1"></textarea> -->
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    //   $(document).ready(function() {
    //     $("#example1").emojioneArea();
    //   });
</script>
@endsection