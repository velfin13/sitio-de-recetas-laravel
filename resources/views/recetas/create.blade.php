@extends('layouts.app')

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2">Regresar</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Crea tus recetas</h2>

    <div class="row justify-content-center mt-5">

        <div class="col-md-8">
            <form method="post" action="{{ route('recetas.store') }}" novalidate>
                @csrf
                {{-- titulo receta --}}
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo"
                        placeholder="Título de Receta" value="{{old('titulo')}}">
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- boton submit --}}
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>
            </form>


        </div>
    </div>

@endsection
