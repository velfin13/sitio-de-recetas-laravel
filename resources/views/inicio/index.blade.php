@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

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
                        <a class="btn btn-outline-primary font-weight-bold d-block"
                            href="{{ route('recetas.show', ['receta' => $nueva->id]) }}">Ver <i class="fa fa-eye"
                                aria-hidden="true"></i></a>
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

                                    <p>{{count($receta->likes)}}  <i class="fa fa-heart" aria-hidden="true"></i></p>


                                </div>

                                <a class="btn btn-outline-primary font-weight-bold d-block"
                                    href="{{ route('recetas.show', ['receta' => $receta->id]) }}">Ver <i class="fa fa-eye"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endforeach

                @endforeach
            </div>
        </div>
    @endforeach
@endsection
