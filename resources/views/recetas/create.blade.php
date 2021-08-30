@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<form method="post" action="{{ route('recetas.store') }}" novalidate enctype="multipart/form-data">
    <div id="create-recipe" class="container-fluid">
        <div class="title-wrapper" style="display: flex; flex-direction: row; justify-content: space-between;">
            <h2 class="subtitle"><b>😲 Nueva Receta</b></h2>
            <a href="{{route('recetas.create')}}">
                <input type="submit" class="btn action-button" value="Agregar Receta">
            </a>
        </div>
        <hr class="divider">

        <br>

        @csrf
        <!-- DETALLES RECETA -->
        <section id="info">
            <h3><b>🧾 Receta</b></h3>
            <hr class="divider" style="width: 200px;">

            <div class="row">
                <div class="col-12 col-md-6 col-xl-6" style="margin-bottom: 10px;">
                    {{-- titulo receta --}}
                    <div class="form-group">
                        <span style="margin: 3px;"><b>*Nombre:</b></span>
                        <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo" placeholder="Nombre" value="{{ old('titulo') }}">
                        @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-6">
                    <div class="form-group">
                        <span style="margin: 3px;"><b>*Categoría:</b></span>
                        <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">
                            <option value="">--Seleccionar--</option>
                            @foreach ($categorias as $categoria)
                            <option {{ old('categoria') == $categoria->id ? 'selected' : '' }} value="{{ $categoria->id }}">
                                {{ $categoria->nombre }}
                            </option>
                            @endforeach
                        </select>

                        @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>

        <!-- INGREDIENTES Y PREPARACION -->
        <section id="ingredients-preparation">
            <h3><b>📒 Ingredientes & Preparación</b></h3>
            <hr class="divider" style="width: 200px;">

            <div class="row">
                <div class="col-12 col-md-6 col-xl-6" style="margin-bottom: 10px;"> 
                    <div class="form-group">
                        <span style="margin: 3px;"><b>*Ingredientes:</b></span>

                        <input id="ingredientes" value="<ol><li></li></ol>" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">
                        <trix-editor class="form-control @error('ingredientes') is-invalid @enderror" input="ingredientes">
                        </trix-editor>

                        @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-6">
                    <div class="form-group">
                        <span style="margin: 3px;"><b>*Preparación:</b></span>

                        <input id="preparacion" type="hidden" name="preparacion" value="{{ old('preparacion') }}">
                        <trix-editor input="preparacion" class="form-control @error('preparacion') is-invalid @enderror">
                        </trix-editor>

                        @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>

        <!-- IMAGEN / VIDEO -->
        <section id="image-video" style="margin-bottom: 30px;">
            <h3><b>👀 Imagen & Video</b></h3>
            <hr class="divider" style="width: 200px;">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <span style="margin: 3px;"><b>*Imagen:</b></span>
                        <input type="file" id="imagen" name="imagen" class="form-control @error('ingredientes') is-invalid @enderror" value="{{ old('image') }}">

                        @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <span style="margin: 3px;"><b>Video URL (YouTube):</b></span>
                        <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" id="url" placeholder="Ejemplo https://www.youtube.com/ejemplo      (solo enlaces de youtube)" value="{{ old('url') }}">
                        @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection