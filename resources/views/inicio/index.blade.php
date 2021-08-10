@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

{{-- buscador --}}
@section('hero')
<div class="hero-categorias">
    <div class="hero-info text-center">
        <h1 class="hero-info__title">Encuentra tu receta ideal</h1>
        <h2 class="hero-info__info">Comparte, explora y aprende como elaborar tu receta.</h2>
    </div>

    <center>
        <form class="hero-search form-group" action="{{ route('buscar.show') }}" method="POST">
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

{{-- ultimas recetas --}}
<div class="container nuevas-recetas">
    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Últimas recetas</h2>

    {{-- carrucel --}}
    <div class="owl-carousel owl-theme">
        @foreach ($nuevas as $nueva)

        <div class="card">
            <img src="/storage/{{ $nueva->imagen }}" alt="img" class="card-img-top img-fluid">
            <div class="card-body">
                <h3 class="text-center">{{ Str::title($nueva->titulo) }}</h3>
                <p>{{ Str::words(strip_tags($nueva->preparacion), 11) }}</p>

                <div class="meta-receta d-flex justify-content-between">
                    @php
                    $fecha = $nueva->created_at;
                    @endphp

                    <p class="text-primary fecha font-weight-bold">
                        <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
                    </p>

                    <p>{{ count($nueva->likes) }} <i class="fa fa-heart" aria-hidden="true"></i></p>


                </div>
                <a class="btn btn-outline-primary font-weight-bold d-block" href="{{ route('recetas.show', ['receta' => $nueva->id]) }}">Ver <i class="fa fa-eye" aria-hidden="true"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@foreach ($recetas as $key => $group)
<div class="container">
    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{ str_replace('-', ' ', $key) }}</h2>

    {{-- carrucel --}}
    <div class="owl-carousel owl-theme">
        @foreach ($group as $recetas)
        @foreach ($recetas as $receta)
        <div class="card shadow">
            <img src="/storage/{{ $receta->imagen }}" alt="img" class="card-img-top img-fluid">
            <div class="card-body">
                <h3 class="text-center">{{ Str::title($receta->titulo) }}</h3>
                <p>{{ Str::words(strip_tags($receta->preparacion), 11) }}</p>

                <div class="meta-receta d-flex justify-content-between">
                    @php
                    $fecha = $receta->created_at;
                    @endphp

                    <p class="text-primary fecha font-weight-bold">
                        <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
                    </p>

                    <p>{{ count($receta->likes) }} <i class="fa fa-heart" aria-hidden="true"></i></p>


                </div>

                <a class="btn btn-outline-primary font-weight-bold d-block" href="{{ route('recetas.show', ['receta' => $receta->id]) }}">Ver <i class="fa fa-eye" aria-hidden="true"></i></a>
            </div>
        </div>
        @endforeach

        @endforeach
    </div>
</div>
@endforeach
@endsection