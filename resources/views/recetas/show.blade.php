@extends('layouts.app')

@section('content')
<div id="recipe-detail" class="container-fluid">
    <h2 class="subtitle"><b>🧾 {{Str::title($recetas->titulo)}}</b></h2>
    <hr class="divider">

    <div class="row">
        <div class="image-wrapper col-6">
            <h1>imagen</h1>
        </div>
        <div class="video-wrapper col-6">
            <h1>video</h1>
        </div>
    </div>

    <div class="row">
        <h5>Detalles</h5>
        <hr class="divider">
    </div>
</div>
@endsection