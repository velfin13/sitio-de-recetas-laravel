<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>{{ $titulo }}</title>
</head>

<body>

    <article class="contenido-receta bg-white shadow p-4">
        <h1 class="text-center mb-4" style="color: #007BFF">{{ Str::title($titulo) }}</h1>



        {{-- imagen de la receta --}}
        <div class="imagen-receta row">
            <div class="col-12">
                <center><img src="{{ public_path('/storage/' . $imagen) }}" alt="img" class="w-75 mb-4"
                        style="border-radius: 40px;box-shadow: 7px 10px 28px -4px rgba(0,0,0,0.75);">
                </center>

            </div>
        </div>



        {{-- autor y categoria ingredientes preparacion fecha --}}
        <div class="receta-meta">
            <div class="ingredientes">
                <h2 class="my-3 text-primary text-center font-weight-bold">INGREDIENTES:</h2>
                {!! $ingredientes !!}
            </div>

            <div class="ingredientes">
                <h2 class="my-3 text-primary text-center font-weight-bold">PREPARACIÓN:</h2>
                {!! $preparacion !!}
            </div>

        </div>
    </article>

</body>

</html>
