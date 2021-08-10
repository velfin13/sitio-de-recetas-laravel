@extends('layouts.app')

{{-- buscador --}}
@section('hero')
<div class="hero-categorias">
    <div class="hero-info text-center">
        <h1 class="hero-info__title">Encuentra tu receta ideal</h1>
        <h2 class="hero-info__info">Comparte, explora y aprende como elaborar tu receta.</h2>
    </div>

    <center>
        <form class="hero-search form-group" action="{{ route('buscar.show') }}">
            <div class="input-group col-md-4">
                <input class="form-control py-2 border-right-0 border" type="search" value="search" id="example-search-input" placeholder="Encuentra tu receta ideal ">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary border-left-0 border" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </center>
</div>
@endsection

@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{$categoriaReceta->nombre}}</h2>
        <div class="row">
            @foreach ($recetas as $receta)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/storage/{{ $receta->imagen }}" alt="" class="card-img-top" alt="img">
                        <div class="card-body">
                            <h3 class="text-center">{{ $receta->titulo }}</h3>

                            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}"
                                class="btn btn-outline-primary d-block mt-4 font-weight-bold">Ver Receta <i
                                    class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $recetas->links() }}
    </div>
@endsection
