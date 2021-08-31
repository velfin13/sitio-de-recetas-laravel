@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- <section id="profile">
                                                    <h2 class="subtitle"><b>👋 Hola {{ $perfil->usuario->name }}! </b></h2>
                                                    <hr class="divider">

                                                    <div class="row">
                                                        <div id="first" class="col-12 col-md-6 col-xl-6">
                                                            <h1>Nombre</h1>
                                                        </div>
                                                        <div id="second" class="col-12 col-md-6 col-xl-6">
                                                            @if ($perfil->imagen)
                                                            <img class="rounded-circle" src="/storage/{{ $perfil->imagen }}" alt="img" style="width: 10rem;">
                @else
                                                            <img class="rounded-circle" src="{{ asset('images/noImage.jpg') }}" alt="img" style="width: 10rem;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </section> -->

        <section id="profile">
            @auth
                @if (Auth::user()->id == $perfil->user_id)
                    <h2 class="subtitle"><b>👋 Hola {{ $perfil->usuario->name }}! </b></h2>
                @endif
            @endauth

            <hr class="divider">

            <div class="my-profile row">
                <div class="my-profile__avatar col-1">
                    <div class="my-profile__avatar-image">
                        @if ($perfil->imagen)
                            <img class="rounded-circle" src="/storage/{{ $perfil->imagen }}" alt="img"
                                style="width: 15rem; height: 15rem;">
                        @else
                            <img class="rounded-circle" src="{{ asset('images/noImage.jpg') }}" alt="img"
                                style="width: 15rem; height: 15rem;">
                        @endif
                    </div>
                    <div class="my-profile__avatar-name" style="margin-top: 20px;">
                        <h5>{{ $perfil->usuario->name }}</h5>
                    </div>
                </div>

                <div class="col-12 text-center" style="margin-bottom: 15px;">
                    @if ($perfil->usuario->url)
                        <a href="{{ $perfil->usuario->url }}">{{ $perfil->usuario->url }}</a>
                    @endif
                </div>

                <div class="my-profile__bio col-11 text-center"
                    style="justify-content: center; align-items: center; align-content: center; display: flex;">
                    <div class="bio-wrapper"
                        style="background-color: #FAFAFA; width: 800px; min-width: 800px; padding: 30px; border: 1px #E5E5E5 solid;">
                        @auth
                            @if (Auth::user()->id == $perfil->user_id)
                                @if ($perfil->biografia)
                                    <h5>{!! $perfil->biografia !!}</h5>
                                @else
                                    <h5>"Aun no has añadido tu biografia"</h5>
                                @endif
                            @else
                                <h5>"Este usuario aun no ha añadido una biografia"</h5>
                            @endif
                        @else
                            <h5>"Este usuario aun no ha añadido una biografia"</h5>
                        @endauth
                    </div>
                </div>

                @auth
                    @if (Auth::user()->id == $perfil->user_id)
                        <div class="actions col-12"
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; margin-top: 15px;">
                            <a href="{{ route('perfiles.edit', ['perfil' => Auth::user()->id]) }}">
                                <button class="btn action-button">Editar Perfil</button>
                            </a>
                        </div>
                    @endif
                @endauth


            </div>
        </section>

        <br>
        <br>

        <section id="recipes">
            <!-- PROFILE RECIPES -->
            @auth
                @if (Auth::user()->id == $perfil->user_id)
                    <h2 class="subtitle"><b>🤤 Tus últimas recetas </b></h2>
                @else
                    <h2 class="subtitle"><b>🤤 Últimas recetas creadas por {{ $perfil->usuario->name }}</b></h2>
                @endif
            @else
                <h2 class="subtitle"><b>🤤 Últimas recetas creadas por {{ $perfil->usuario->name }}</b></h2>
            @endauth



            <hr class="divider">

            @if (count($recetas) > 0)
                <!-- SPLIDE HORIZONTAL -->
                <div id="splide-horizontal" class="splide splide-horizontal">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($recetas as $receta)
                                <li class="splide__slide" style="margin-left: 30px; margin-right: 30px;">
                                    <!-- RECIPE CARD -->
                                    <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}">
                                        <div class="recipe-card">
                                            <div class="top">
                                                <div class="left">
                                                    <!-- {{ $receta->url }} -->
                                                    <h5><b>{{ Str::title($receta->titulo) }}</b></h5>
                                                    <h6>Creado por <b>Joseph Garcia</b></h6>
                                                </div>
                                                <div class="right">
                                                    <span class="figure"><i class="fas fa-chevron-right"></i></span>
                                                </div>
                                            </div>

                                            <div class="body">
                                                <div class="body__top">
                                                    <p class="steps">
                                                        {{ Str::words(strip_tags($receta->preparacion), 18) }}</p>
                                                </div>
                                                <div class="body__bottom">
                                                    <!-- LEFT -->
                                                    <div class="left">
                                                        <div class="image">
                                                            <div class="background">
                                                                <img class="image"
                                                                    src="/storage/{{ $receta->imagen }}"
                                                                    alt="recipe-image">
                                                            </div>
                                                            <div class="content">
                                                                <i class="far fa-image"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- RIGHT -->
                                                    <div class="right">
                                                        @if ($receta->url === null)
                                                            <div class="video video--empty">
                                                                <i class="fas fa-video"></i>
                                                            </div>
                                                        @else
                                                            <div class="video">
                                                                <div class="background">
                                                                    <img src="https://img.youtube.com/vi/f0DSVVP89Gs/default.jpg"
                                                                        alt="thumbnail">
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
                                                <span
                                                    class="date">{{ date('d-m-Y', strtotime($receta->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- END RECIPE CARD -->
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END SPLIDE HORIZONTAL -->

            @else
                <div class="container-fluid">
                    <p class="alert alert-warning text-center"><b>Este usuario aun no ha creado ninguna receta!</b></p>
                </div>
            @endif
        </section>

    </div>
@endsection
