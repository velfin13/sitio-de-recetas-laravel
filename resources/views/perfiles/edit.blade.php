@extends('layouts.app')


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')

<form action="{{ route('perfiles.update', ['perfil' => $perfil->id]) }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <div id="edit-profile" class="container-fluid">
        <div class="title-wrapper" style="display: flex; flex-direction: row; justify-content: space-between;">
            <h2 class="subtitle"><b>✏️ Editar Perfil</b></h2>
            <input type="submit" class="btn action-button" value="Guardar Cambios">
        </div>
        <hr class="divider">

        <section id="info">
            <h3><b>🥸 Información Personal</b></h3>
            <hr class="divider" style="width: 200px;">

            <div class="row">
                <div class="col-12 col-md-6 col-xl-6" style="margin-bottom: 10px;">
                    <div class="form-group">
                    <span style="margin: 3px;"><b>*Nombre:</b></span>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="Nombre de usuario" value="{{ $perfil->usuario->name }}">
                        @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <div class="col-12 col-md-6 col-xl-6">
                    <div class="form-group">
                    <span style="margin: 3px;"><b>*Sitio web:</b></span>
                        <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" id="url" placeholder="Sitio web" value="{{ $perfil->usuario->url }}">
                        @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <br>

        <section id="about-me">
            <h3><b>😳 Sobre mí</b></h3>
            <hr class="divider" style="width: 200px;">

            <div class="row">
                <div class="col-12 col-md-12 col-xl-12" style="margin-bottom: 10px;">
                    <div class="form-group">
                    <span style="margin: 3px;"><b>*Biografía:</b></span>

                        <input id="biografia" type="hidden" name="biografia" value="{{ $perfil->biografia }}">
                        <trix-editor style="min-height: 180px;" input="biografia" class="form-control @error('biografia') is-invalid @enderror">
                        </trix-editor>

                        @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <br>

        <section id="image">
            <h3><b>😎 Foto</b></h3>
            <hr class="divider" style="width: 200px;">

            <div class="row">
                <div class="col-12 col-md-12 col-xl-12" style="margin-bottom: 10px;">
                    <div class="form-group">
                        @if ($perfil->imagen)
                        <div class="image-wrapper">
                            <img src="/storage/{{ $perfil->imagen }}" alt="img" style="width: 15rem;">
                        </div>
                        <br>
                        @endif

                        @if (!$perfil->imagen)
                        <span style="margin: 3px;"><b>Foto:</b></span>
                        @endif

                        <input type="file" id="imagen" name="imagen" class="form-control @error('ingredientes') is-invalid @enderror" value="{{ old('imagen') }}">

                        @error('imagen')
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