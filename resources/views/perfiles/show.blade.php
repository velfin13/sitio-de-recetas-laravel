@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- PROFILE -->
    <h2 class="subtitle"><b>👋 Hola {{ $perfil->usuario->name }}! </b></h2>
    <hr class="divider">

    <div class="my-profile row">
        <div class="my-profile__avatar col-1">
            <div class="my-profile__avatar-image">
                @if ($perfil->imagen)
                <img class="rounded-circle" src="/storage/{{ $perfil->imagen }}" alt="img" style="width: 3rem;">
                @else
                <img class="rounded-circle" src="{{ asset('images/noImage.jpg') }}" alt="img" style="width: 3rem;">
                @endif
            </div>
            <div class="my-profile__avatar-name">
                <h5>{{ $perfil->usuario->name }}</h5>
            </div>
        </div>

        <div class="col-12 text-center" style="margin-bottom: 20px;">
            {{-- si tiene pagina web --}}
            @if ($perfil->usuario->url)
            <a href="{{ $perfil->usuario->url }}">{{ $perfil->usuario->url }}</a>
            @endif
            www.dominio.com
        </div>

        <div class="my-profile__bio col-11">
            @if ($perfil->biografia)
            <p>{!! $perfil->biografia !!}</p>
            @else
            <p>Aun no has agregado tu biografia</p>
            @endif
        </div>
    </div>

    <br>
    <br>
    <br>

    <!-- PROFILE RECIPES -->
    <h2 class="subtitle"><b>🤤 Tus últimas recetas </b></h2>
    <hr class="divider">

    <div class="row">
        @if (count($recetas) > 0)
        @foreach ($recetas as $receta)
        <div class="col-4">
            <div class="card">
                <img src="/storage/{{ $receta->imagen }}" alt="" class="card-img-top" alt="img">
                <div class="card-body">
                    <h3 class="text-center">{{ $receta->titulo }}</h3>
                    <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-outline-primary d-block mt-4 font-weight-bold">Ver Receta <i class="fa fa-eye" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="container-fluid">
            <p class="alert alert-warning text-center"><b>Este usuario aun no ha creado ninguna receta!</b></p>
        </div>
        @endif
    </div>
</div>
@endsection