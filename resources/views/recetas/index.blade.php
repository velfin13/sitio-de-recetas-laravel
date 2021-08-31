@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.25/af-2.3.7/b-1.7.1/r-2.2.9/datatables.min.css" />
@endsection

@section('content')
    <div class="container-fluid">
        <section id="table">
            <div class="title-wrapper" style="display: flex; flex-direction: row; justify-content: space-between;">
                <h2 class="subtitle"><b>🧾 Administrar Recetas</b></h2>
                <a href="{{ route('recetas.create') }}">
                    <button class="btn action-button">Añadir Receta</button>
                </a>
            </div>
            <hr class="divider">
            <!-- TABLE RECIPES -->
            <div class="table-responsive">
                <table id="recipes-table" class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th class="col-4 col-md-6 col-xl-6">Receta</th>
                            <th class="col-4 col-md-4 col-xl-5">Categoría</th>
                            <th class="col-4 col-md-2 col-xl-1">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($recetas) === 0)
                            <tr>
                                <td class="alert alert-warning text-center" colspan="3"><b>Aún no has creado recetas 😒</b>
                                </td>
                            </tr>
                        @else
                            @foreach ($recetas as $receta)

                                <tr>
                                    <td><a href="{{ route('recetas.show', ['receta' => $receta->id]) }}">{{ $receta->titulo }}
                                        </a>
                                    </td>
                                    <td><a href="{{ route('recetas.show', ['receta' => $receta->id]) }}">{{ $receta->categoria->nombre }}
                                        </a>
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}"
                                            class="btn btn-primary"><i class="far fa-edit" style="color: white;"></i></a>
                                        <eliminar-receta receta-id={{ $receta->id }}></eliminar-receta>
                                    </td>
                                </tr>

                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </section>

        <br>
        <br>

        <!-- FAVORITES -->
        <section>
            <h2 class="subtitle"><b>😈 Favoritos</b></h2>
            <hr class="divider">

            @if (count(Auth::user()->meGusta) > 0)
                <!-- SPLIDE HORIZONTAL -->
                <div id="splide-favorites-horizontal" class="splide splide-favorites-horizontal">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach (Auth::user()->meGusta as $receta)
                                <li class="splide__slide" style="margin-left: 30px; margin-right: 30px;">
                                    <!-- LATEST CARD -->
                                    <div class="latest-recipe-card">
                                        <div class="background">
                                            <img class="image" src="/storage/{{ $receta->imagen }}" alt="image">
                                        </div>
                                        <div class="content">
                                            <div class="body">
                                                <h5 class="title">{{ Str::title($receta->titulo) }}</h5>
                                                <h6 class="created_by">
                                                    {{ Str::words(strip_tags($receta->preparacion), 8) }}
                                                </h6>
                                            </div>
                                            <div class="footer">
                                                <span class="likes"><i class="fas fa-heart"></i><b
                                                        class="counter">{{ count($receta->likes) }}</b></span>
                                                <span
                                                    class="date">{{ date('d-m-Y', strtotime($receta->created_at)) }}</span>
                                            </div>
                                        </div>
                                        <div class="see-more">
                                            <span><a href="{{ route('recetas.show', ['receta' => $receta->id]) }}">Ver
                                                    👀</a></span>
                                        </div>
                                    </div>
                                    <!-- END LATEST CARD -->
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END SPLIDE HORIZONTAL -->
            @else
                <p class="alert alert-warning text-center"><b>Aún no has agregado recetas a favoritos 😅</b></p>
            @endif
        </section>
    </div>
@endsection
