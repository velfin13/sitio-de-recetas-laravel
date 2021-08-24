@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.25/af-2.3.7/b-1.7.1/r-2.2.9/datatables.min.css" />
@endsection

@section('botones')
    <a href="{{ route('recetas.create') }}" class="btn btn-primary ml-2"><i class="fa fa-arrow-left"
            aria-hidden="true"></i> Nueva</a>

@endsection

@section('content')
    <div class="container-fluid">
        <h2 class="subtitle"><b>Administrar Recetas</b></h2>
        <hr class="divider">
        <!-- TABLE RECIPES -->
        <table class="table table-bordered table-striped table-hover text-center" id="example">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoria</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recetas as $receta)
                    <tr>
                        <td>{{ $receta->titulo }}</td>
                        <td>{{ $receta->categoria->nombre }}</td>
                        <td>
                            <eliminar-receta class="mt-2" receta-id={{ $receta->id }}></eliminar-receta>
                            <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}"
                                class="btn btn-dark mr-1 mt-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}"
                                class="btn btn-success mr-1 mt-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <br>

        <!-- FAVORITES -->
        <h2 class="subtitle"><b>Favoritos 😈</b></h2>
        <hr class="divider">
        @if (count(Auth::user()->meGusta) > 0)
            @foreach (Auth::user()->meGusta as $receta)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p>{{ $receta->titulo }}</p>
                    <a class="btn btn-outline-success font-weight-bold"
                        href="{{ route('recetas.show', ['receta' => $receta->id]) }}">Ver <i class="fa fa-eye"
                            aria-hidden="true"></i></a>
                </li>
            @endforeach
        @else
            <div class="alert alert-warning" role="alert">
                <b>Aun no le has dado me gusta a ninguna receta!</b>
                <small>Dale me gusta y apareceran aqui!!</small>
            </div>
        @endif
    </div>
@endsection
