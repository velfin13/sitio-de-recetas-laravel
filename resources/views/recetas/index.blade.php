@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/af-2.3.7/b-1.7.1/r-2.2.9/datatables.min.css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="title-wrapper" style="display: flex; flex-direction: row; justify-content: space-between;">
        <h2 class="subtitle"><b>🧾 Administrar Recetas</b></h2>
        <a href="{{route('recetas.create')}}">
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
                @foreach ($recetas as $receta)
                <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}">
                    <tr class="clickable-row" data-href="{{ route('recetas.show', ['receta' => $receta->id]) }}">
                        <td>{{ $receta->titulo }}</td>
                        <td>{{ $receta->categoria->nombre }}</td>
                        <td class="actions">
                            <eliminar-receta receta-id={{ $receta->id }}></eliminar-receta>
                            <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}" class="btn btn-primary"><i class="far fa-edit" style="color: white;"></i></a>
                        </td>
                    </tr>
                </a>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>
    <br>

    <!-- FAVORITES -->
    <h2 class="subtitle"><b>😈 Favoritos</b></h2>
    <hr class="divider">
    @if (count(Auth::user()->meGusta) > 0)
    @foreach (Auth::user()->meGusta as $receta)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <p>{{ $receta->titulo }}</p>
        <a class="btn btn-outline-success font-weight-bold" href="{{ route('recetas.show', ['receta' => $receta->id]) }}">Ver <i class="fa fa-eye" aria-hidden="true"></i></a>
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