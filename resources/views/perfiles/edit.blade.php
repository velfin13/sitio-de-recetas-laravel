@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css"
        integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
@endsection

@section('content')
    <h1 class="text-center">Editar mi perfil</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('perfiles.update', ['perfil' => $perfil->id]) }}" novalidate method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- Nombre de usuario --}}
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                        placeholder="Nombre de usuario" value="{{ $perfil->usuario->name }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Sitio web de usuario --}}
                <div class="form-group">
                    <label for="url">Sitio web:</label>
                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url"
                        placeholder="Sitio web" value="{{ $perfil->usuario->url }}">
                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                {{-- Biografia del usuario --}}
                <div class="form-group mt-4">
                    <label for="biografia">Biografía:</label>

                    <input id="biografia" type="hidden" name="biografia" value="{{ $perfil->biografia }}">
                    <trix-editor input="biografia" class="form-control @error('biografia') is-invalid @enderror">
                    </trix-editor>

                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                {{-- campo de imagen --}}
                <div class="form-group mt-3">


                    @if ($perfil->imagen)
                        <div class="mt-4">
                            <p>Tu imagen actual:</p>
                            <img src="/storage/{{ $perfil->imagen }}" alt="img" style="width: 300px;border: 35px">
                        </div>
                        <br>
                    @endif

                    @if (!$perfil->imagen)
                        <label for="imagen">Agrega una Imagen de Perfil</label>
                    @endif

                    @if ($perfil->imagen)
                        <label for="imagen">Cambia tu Imagen de Perfil</label>
                    @endif
                    <input type="file" id="imagen" name="imagen"
                        class="form-control @error('ingredientes') is-invalid @enderror" value="{{ old('imagen') }}">

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- boton submit --}}
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar Usuario">
                </div>

            </form>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"
        integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
