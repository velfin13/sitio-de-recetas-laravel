@extends('layouts.app')

@section('botones')
    @include('ui.navegacion')
@endsection

@section('content')
    <h2 class="text-center mb-5">Administra tus recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table table-borderless table-hover">
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


                            {{-- <a href="{{ route('recetas.destroy', ['receta' => $receta->id]) }}"
                                class="btn btn-danger mr-1"><i class="fa fa-trash" aria-hidden="true"></i></a> --}}

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
        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $recetas->links() }}
        </div>

    </div>
@endsection
