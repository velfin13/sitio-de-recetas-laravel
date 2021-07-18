<div class="container">
    <a href="{{ route('recetas.create') }}" class="btn btn-outline-primary font-weight-bold text-dark mr-2 mt-2">Crear
        Receta <i class="fa fa-plus-circle" aria-hidden="true"></i></a>

    <a href="{{ route('perfiles.edit', ['perfil' => Auth::user()->id]) }}"
        class="btn btn-outline-success font-weight-bold text-dark mr-2 mt-2">Editar Perfil <i
            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

    <a href="{{ route('perfiles.show', ['perfil' => Auth::user()->id]) }}"
        class="btn btn-outline-info font-weight-bold text-dark mt-2">Ver Perfil <i class="fa fa-eye"
            aria-hidden="true"></i></a>
</div>
