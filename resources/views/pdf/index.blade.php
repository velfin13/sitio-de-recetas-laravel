<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- <style src='{{asset("css/pdf.css")}}'></style> -->

    <title>{{ $titulo }}</title>

    <style>
        html,
        body {
            position: relative;
            border-width: 3px;
            border-style: dashed;
            border-color: black;
            background-color: #F4EAE8;
            /* background-image: url("https://as1.ftcdn.net/v2/jpg/02/60/82/42/500_F_260824256_GZOo3XB2t7eS5GldMhVx24bT8VRze3Hk.jpg"); */
            background-image: url("https://ecommerce-velfin.s3.amazonaws.com/bg.jpg");
        }

        html::after,
        body::after {
            content: "";
            background: rgba(244, 234, 232, 0.8);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -200;
        }

        .recipe-opacity {
            background: rgba(244, 234, 232, 0.8);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: auto;
            height: auto;
            z-index: -300;
        }

        .recipe .recipe__head {
            height: 25px;
            padding-top: 5px;
            padding-bottom: 5px;
            border-bottom: 3px black dashed;
            /* border-bottom: 3px #E2D4CC dashed; */
        }

        .recipe .recipe__head .recipe__head-left,
        .recipe .recipe__head-right {
            width: 50%;
            float: left;
        }

        .recipe .recipe__head .recipe__head-left {
            /* background-color: red; */
            margin-left: 10px;
        }

        .recipe .recipe__head .recipe__head-right {
            color: black;
        }

        .recipe .recipe__body {
            margin-top: 30px;
            margin-left: 10px;
            z-index: -300;
        }

        /* .recipe .recipe__body::after {
            background: rgba(244, 234, 232, 0.8);
            height: ;
        } */

        .recipe .recipe__body .recipe__body-image {
            margin-top: 30px;

        }

        .recipe .recipe__body .recipe__body-image .recipe__body-image__img {
            margin-top: 20px;
            background-color: black;
            opacity: 0.9;
            border: 10px white solid;
        }
    </style>
</head>

<body>
    <div class="recipe">
        <div class="recipe__head">
            <div class="recipe__head-left">
                <p><b>RECETA:</b></p>
            </div>
            <div class="recipe__head-right">
                <p>{{ Str::title($titulo) }}</p>
            </div>
        </div>
        <div class="recipe__body">
            <div class="recipe__body-ingredients">
                <h5>INGREDIENTES:</h5>
                {!! $ingredientes !!}
            </div>
            <hr style="border-bottom: 3px black dashed;">
            <div class="recipe__body-preparation">
                <h5>PREPARCION:</h5>
                {!! $preparacion !!}
            </div>
            <hr style="border-bottom: 3px black dashed;">
            <div class="recipe__body-image">
                <h5>FOTO:</h5>
                <center><img width="600 px;" class="recipe__body-image__img" src="{{ public_path('/storage/' . $imagen) }}" alt="img"></center>
            </div>
        </div>
    </div>
</body>

</html>