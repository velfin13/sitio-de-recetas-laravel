@extends('layouts.app')

@section('content')
<div id="recipe-detail" class="container-fluid">
    <h2 class="subtitle"><b>🧾 {{Str::title($recetas->titulo)}}</b></h2>
    <hr class="divider">

    <section id="multimedia">
        <div class="row">
            <div class="image-wrapper col-12 col-sm-12 col-md-6 col-xl-6">
                <img src="/storage/{{ $recetas->imagen }}" alt="img">
            </div>
            <div class="video-wrapper col-12 col-sm-12 col-md-6 col-xl-6">
                @if($recetas->url === null)
                <h1>sin video</h1>
                @else
                {{$recetas->url}}
                <iframe src="{{ $recetas->url }}"></iframe>
                @endif
            </div>
        </div>
    </section>

    <section id="chef">
        <div class="row">
            <h5>Detalles</h5>
            <hr class="divider">
        </div>
    </section>

    <section id="recipe">
        <div class="row">
            <h5>Detalles</h5>
            <hr class="divider">
        </div>
    </section>

</div>
@endsection