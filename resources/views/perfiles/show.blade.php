@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-5">
                @if ($perfil->imagen)
                    <img src="/storage/{{ $perfil->imagen }}" alt="img" class="w-100 rounded-circle">
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center mb-2 text-primary">{{ $perfil->usuario->name }}</h2>

                {{-- si tiene pagina web --}}
                @if ($perfil->usuario->url)

                    <a href="{{ $perfil->usuario->url }}">Visitar Sitio web</a>
                @endif


                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center my-5">Recetas creada por <b>{{ $perfil->usuario->name }}</b></h2>
    
    <div class="row mx-auto p-4">
        @if (count($recetas) > 0)
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

        @else
            <div class="d-flex justify-content-center">
                <p class="alert alert-warning"><b>Aun no has creado ninguna receta!</b>
                    <small>Crea una y apareceran aqui!!</small>
                </p>
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-center">
        {{ $recetas->links() }}
    </div>




@endsection
