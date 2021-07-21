@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Resultados de <b>{{ $busqueda }}</b></h2>
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
