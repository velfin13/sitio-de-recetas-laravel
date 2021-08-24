@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
@endsection

{{-- buscador --}}
@section('hero')
<div class="hero-categorias">
    <div class="hero-info text-center">
        <h1 class="hero-info__title">Encuentra tu receta ideal</h1>
        <h2 class="hero-info__info">Comparte, explora y aprende como elaborar tu receta.</h2>
    </div>

    <center>
        <form class="hero-search form-group" action="{{ route('buscar.show') }}" method="GET">
            <div class="input-group col-md-4">
                <input class="form-control py-2 border-right-0 border" name="buscar" type="search" placeholder="Encuentra tu receta ideal ">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary border-left-0 border" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </center>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <!-- ULTIMAS RECETAS -->
    <section class="latest-recipes">
        <h2 class="subtitle"><b>🧐 Últimas Recetas</b></h2>
        <hr class="divider">

        <!-- CAROUSEL ULTIMAS RECETAS -->
        <!-- <div class="owl-carousel owl-theme lastest-recipes-carousel">
            @foreach ($nuevas as $nueva)
            <div class="latest-recipe-card">
                <div class="latest-recipe-card__image">
                    <img src="/storage/{{ $nueva->imagen }}" alt="img">
                </div>
                <div class="latest-recipe-card__info">
                    <span class="latest-recipe-card__info-title">{{ Str::title($nueva->titulo) }}</span>
                </div>
            </div>
            @endforeach
        </div> -->

        <!-- CAROUSEL ULTIMAS RECETAS -->
        <div id="splide-latest-recipes-horizontal" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($nuevas as $nueva)
                    <li class="splide__slide">
                        <a href="{{ route('recetas.show', ['receta' => $nueva->id]) }}" style="text-decoration: none; color:black">
                            <div class="card" style="width: 200px; height: 150px;">
                                <img style="height: 100px;" class="card-img-top" src="/storage/{{ $nueva->imagen }}" alt="Card image cap">
                                <div class="card-body" style="padding-bottom: 40px;">
                                    <h5 class="card-title" style="text-align: center;"><b>{{Str::title($nueva->titulo)}}</b></h5>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <br>
    <br>

    <section class="all-categories-section">
        <h2 class="subtitle"><b>😱 Todas nuestras recetas</b></h2>
        <hr class="divider" style="margin-top:10px;">
        <!-- SPLIDE HORIZONTAL -->
        <div id="splide-horizontal" class="splide splide-horizontal">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($recetas as $key => $group)
                    <div class="splide__slide">
                        <div class="title-wrapper">
                            <h6 class="title-wrapper__text">{{ str_replace('-', ' ', $key) }}</h6>
                        </div>
                        <!-- SPLIDE VERTICAL -->
                        <div id="splide-vertical-{{$loop->index}}" class="splide splide-vertical">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($group as $recetas)
                                    @foreach ($recetas as $receta)
                                    <div class="splide__slide" style="margin: 15px 0px 15px;">
                                        <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" style="text-decoration: none; color:black">
                                            <div class="card" style="width: 200px; min-height: 250px;">
                                                <img class="card-img-top" src="/storage/{{ $receta->imagen }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b>{{ Str::title($receta->titulo) }}</b></h5>
                                                    <p class="card-text">{{ Str::words(strip_tags($receta->preparacion), 11) }}.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- END SPLIDE VERTICAL -->
                    </div>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- END SPLIDE HORIZONTAL -->
    </section>

</div>
@endsection

@section('scripts')
@endsection