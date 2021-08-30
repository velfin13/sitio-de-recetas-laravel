@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="subtitle"><b>🧐 {{$categoriaReceta->nombre}}</b></h2>
    <hr class="divider">

    <div class="categories-wrapper">
        @if(count($recetas) === 0)
        <p class="alert alert-warning text-center"><b>Aún no se han agregado recetas para "{{$categoriaReceta->nombre}}" 🤨</b></p>
        @else
        <!-- SPLIDE HORIZONTAL -->
        <div id="splide-horizontal" class="splide splide-horizontal" >
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($recetas as $receta)
                    <li class="splide__slide">
                        <!-- RECIPE CARD -->
                        <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}">
                            <div class="recipe-card">
                                <div class="top">
                                    <div class="left">
                                        <!-- {{$receta->url}} -->
                                        <h5><b>{{ Str::title($receta->titulo) }}</b></h5>
                                        <h6>Creado por <b>Joseph Garcia</b></h6>
                                    </div>
                                    <div class="right">
                                        <span class="figure"><i class="fas fa-chevron-right"></i></span>
                                    </div>
                                </div>

                                <div class="body">
                                    <div class="body__top">
                                        <p class="steps">{{ Str::words(strip_tags($receta->preparacion), 18) }}</p>
                                    </div>
                                    <div class="body__bottom">
                                        <!-- LEFT -->
                                        <div class="left">
                                            <div class="image">
                                                <div class="background">
                                                    <img class="image" src="/storage/{{ $receta->imagen }}" alt="recipe-image">
                                                </div>
                                                <div class="content">
                                                    <i class="far fa-image"></i>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- RIGHT -->
                                        <div class="right">
                                            @if($receta->url === null)
                                            <div class="video video--empty">
                                                <i class="fas fa-video"></i>
                                            </div>
                                            @else
                                            <div class="video">
                                                <div class="background">
                                                    <img src="https://img.youtube.com/vi/f0DSVVP89Gs/default.jpg" alt="thumbnail">
                                                </div>
                                                <div class="content">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="bottom">
                                    <span class="likes"><i class="fas fa-heart"></i> <b>{{count($receta->likes)}}</b></span>
                                    <span class="date">{{date('d-m-Y', strtotime($receta->created_at))}}</span>
                                </div>
                            </div>
                        </a>
                        <!-- END RECIPE CARD -->
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- END SPLIDE HORIZONTAL -->
        @endif
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $recetas->links() }}
</div>
@endsection