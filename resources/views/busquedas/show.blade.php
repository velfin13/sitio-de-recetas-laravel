@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="subtitle"><b>🧐 {{count($recetas)}} Resultado(s) para "{{$busqueda}}"</b></h2>
    <hr class="divider">


    @foreach ($recetas as $receta)
    <div class="row">
        <div class="col-12">
            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}">
                <div class="search-item">
                    <div class="first">
                        <img class="image" src="/storage/{{ $receta->imagen }}" alt="recipe-image">
                    </div>
                    <div class="second ">
                        <span class="title"><b>{{ Str::title($receta->titulo) }}</b></span>
                        <span class="steps"><i class="far fa-align-left"></i> {{ Str::words(strip_tags($receta->preparacion), 18)}}</span>
                    </div>
                    <div class="third d-none d-md-flex"><span><i class="fal fa-calendar-alt"></i> {{ date('d-m-Y', strtotime($receta->created_at)) }}</span></div>
                    <div class="four"><span><i class="far fa-angle-right"></i></span></div>
                </div>
            </a>
        </div>
    </div>
    @endforeach

</div>
@endsection

<!-- <div class="col-12 col-md-3 col-xl-3" style="margin-bottom: 20px; display: flex; align-items: center; align-content: center; justify-content: center;">
            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}">
                <div class="recipe-card">
                    <div class="top">
                        <div class="left">
                            <h5><b>{{ Str::title($receta->titulo) }}</b>
                            </h5>
                            <h6>Creado por <b>Joseph Garcia</b></h6>
                        </div>
                        <div class="right">
                            <span class="figure"><i class="fas fa-chevron-right"></i></span>
                        </div>
                    </div>

                    <div class="body">
                        <div class="body__top">
                            <p class="steps">
                                {{ Str::words(strip_tags($receta->preparacion), 18) }}
                            </p>
                        </div>
                        <div class="body__bottom">
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
                            <div class="right">
                                @if ($receta->url === null)
                                <div class="video video--empty">
                                    <i class="fas fa-video"></i>
                                </div>
                                @else
                                <div class="video">
                                    <div class="background">
                                        <video-receta-img link={{ $receta->url }}>
                                        </video-receta-img>
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
                        <span class="likes"><i class="fas fa-heart"></i>
                            <b>{{ count($receta->likes) }}</b></span>
                        <span class="date">{{ date('d-m-Y', strtotime($receta->created_at)) }}</span>
                    </div>
                </div>
            </a>
        </div> -->