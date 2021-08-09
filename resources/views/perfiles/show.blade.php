@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-5">
                @if ($perfil->imagen)
                    <img src="/storage/{{ $perfil->imagen }}" alt="img" class="w-100 rounded-circle">
                @else
                    <img src="{{ asset('images/noImage.jpg') }}" alt="img" class="w-100 rounded-circle">
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center mb-2 text-primary font-weight-bold">{{ $perfil->usuario->name }}</h2>

                {{-- si tiene pagina web --}}
                @if ($perfil->usuario->url)
                    <a href="{{ $perfil->usuario->url }}">Visitar Sitio web</a>
                @endif


                <div class="biografia">
                    @if ($perfil->biografia)
                        {!! $perfil->biografia !!}
                    @else
                        <div class="d-flex justify-content-center mt-5">
                            <p class="alert alert-warning"><b>Este usuario aun no añade una biografia!</b>
                            </p>
                        </div>
                    @endif

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
            <div class="container">
                <p class="alert alert-warning text-center"><b>Este usuario aun no ha creado ninguna receta!</b>
                </p>
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-center">
        {{ $recetas->links() }}
    </div>




@endsection
