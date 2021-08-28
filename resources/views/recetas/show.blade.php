@extends('layouts.app')

@section('content')
<div id="recipe-detail" class="container-fluid">
    <h2 class="subtitle"><b>🧾 {{Str::title($recetas->titulo)}}</b></h2>
    <hr class="divider">

    <section id="multimedia">
        <div class="row">
            <div class="image-wrapper col-12 col-sm-12 col-md-6 col-xl-6">
                <img src="/storage/{{ $recetas->imagen }}" alt="img">
            </div>
            <div class="video-wrapper col-12 col-sm-12 col-md-6 col-xl-6">
                @if($recetas->url === null)
                <h1>sin video</h1>
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
                <p>{!! $recetas->preparacion !!}</p>
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
        <div class="row">
            <div class="col-12">
                @auth
                <form action="{{route('comment.store')}}" class="form" method="POST">
                    @csrf
                    {{-- comentario --}}
                    @error('comentario')
                    <span class="invalid-feedback d-block" role="alert">
                        <div class="alert alert-danger text-center" role="alert">
                            {{ $message }}
                        </div>
                    </span>
                    @enderror
                    <textarea type="text" value="{{ old('comentario') }}" name="comentario" class="@error('comentario') is-invalid @enderror" placeholder="Ingresa tu comentario"></textarea>
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <input type="hidden" value="{{ $recetas->id }}" name="receta_id">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Comentar </button>
                </form>
                @else
                <h1>Para comentar debes inciar sesion</h1>
                @endauth
            </div>
        </div>
        <!-- END FORM -->

        <!-- COMMENTS -->
        <div class="row">
            @if(count($comentarios) === 1)
            <h1>NO HAY COMENTARIOS</h1>
            @else
            <h2>SI HAY COMENTARIOS</h2>
            @endif
        </div>

        <!-- card -->
        <div class="comment col-12">
            <div class="top"></div>
            <div class="body"></div>
            <div class="bottom"></div>
        </div>
        <!-- END COMMENTS -->
    </section>

</div>
@endsection