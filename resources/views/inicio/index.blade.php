@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
@endsection

@section('content')
<div class="container-fluid">
    <!-- ULTIMAS RECETAS -->
    <section class="latest-recipes">
        <h2 class="subtitle"><b>🧐 Últimas Recetas</b></h2>
        <hr class="divider">

        <!-- CAROUSEL ULTIMAS RECETAS -->
        @if(count($nuevas) === 0)
        <p class="alert alert-warning text-center"><b>No se encontraron ultimas recetas 😅!</b></p>
        @else
        <div id="splide-latest-recipes-horizontal" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($nuevas as $nueva)
                    <li class="splide__slide">
                        <!-- LASTS CARD -->
                        <!-- 
                        </a> -->
                        <div class="latest-recipe-card">
                            <div class="background">
                                <img class="image" src="/storage/{{ $nueva->imagen }}" alt="image">
                            </div>
                            <div class="content">
                                <div class="body">
                                    <h5 class="title">{{ Str::title($nueva->titulo)}}</h5>
                                    <h6 class="created_by">{{ Str::words(strip_tags($nueva->preparacion), 8) }}</h6>
                                </div>
                                <div class="footer">
                                    <span class="likes"><b class="counter">{{count($nueva->likes)}}</b><i class="fas fa-heart"></i></span>
                                    <span class="date">{{date('d-m-Y', strtotime($nueva->created_at))}}</span>
                                </div>
                            </div>
                            <div class="see-more">
                                <span><a href="{{ route('recetas.show', ['receta' => $nueva->id]) }}" style="text-decoration: none; color:black">Ver 🧐</a></span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </section>

    <section class="all-categories">
        <h2 class="subtitle"><b>🥰 Todas nuestras recetas</b></h2>
        <hr class="divider" style="margin-top:10px;">


        @if(count($recetas) === 0)
        <p class="alert alert-warning text-center"><b>No se encontró ninguna categoria 😓!</b></p>
        @else
        <!-- SPLIDE HORIZONTAL -->
        <div id="splide-horizontal" class="splide splide-horizontal">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($recetas as $key => $group)
                    <li class="splide__slide">
                        <div class="title-wrapper">
                            <h6 class="title-wrapper__text">{{ str_replace('-', ' ', $key) }}</h6>
                        </div>
                        <!-- SPLIDE VERTICAL -->
                        <div id="splide-vertical-{{$loop->index}}" class="splide splide-vertical">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($group as $recetas)
                                    @if(count($recetas) == 0)
                                    <div class="recipe-card text-center" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                        <span style="font-size: 50px; margin: 10px; color: grey;">😔</span>
                                        <h5>No se encontraron recetas para <br> <b>{{ str_replace('-', ' ', $key) }}</b></h5>
                                    </div>
                                    @endif
                                    @foreach ($recetas as $receta)
                                    <!-- <h1>{{$receta}}</h1> -->

                                    <!-- RECIPE CARD -->
                                    <div class="recipe-card">
                                        <div class="top">
                                            <div class="left">
                                                <h5><b>{{ Str::title($nueva->titulo) }}</b></h5>
                                                <h6>Creado por <b>Joseph Garcia</b></h6>
                                            </div>
                                            <div class="right">
                                                <!-- <span class="favorite"><i class="fas fa-bookmark"></i></span> -->
                                                <!-- <span class="favorite"><i class="far fa-heart"></i></span> -->
                                                <!-- <like-button likes="0" like="0" receta-id="{{ $receta->id }}"></like-button> -->
                                            </div>
                                        </div>

                                        <div class="body">
                                            <!-- <p class="steps">asdjiasdij ijasidjaisd aisjdais djasd ijasdijas dasd ajisdjaisdjsa dasidja isjdaisd asdijasidja</p> -->
                                            <p class="steps">{{ Str::words(strip_tags($receta->preparacion), 11) }}</p>
                                            <img class="image" src="/storage/{{ $nueva->imagen }}" alt="recipe-image">
                                        </div>

                                        <div class="bottom">
                                            <span class="likes"><i class="fas fa-heart"></i> <b>{{count($nueva->likes)}}</b></span>
                                            <span class="date">{{date('d-m-Y', strtotime($receta->created_at))}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- END SPLIDE VERTICAL -->
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- END SPLIDE HORIZONTAL -->
        @endif
    </section>

</div>
@endsection

@section('scripts')
@endsection