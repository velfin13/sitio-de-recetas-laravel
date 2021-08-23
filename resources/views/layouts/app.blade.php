<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('fonts/vendor/font-awesome/css/all.min.css') }}" rel="stylesheet">

    @yield('styles')

    <!-- APP JS and CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div id="app" class="wrapper">
        <!-- SIDEBAR -->
        <nav id="sidebar">
            <div class="custom-menu">
                <section class="custom-menu__title">
                    <h5><b>Dishes 🥡</b></h5>
                </section>

                <section class="custom-menu__list">
                    <div class="menu-item"><i class="fas fa-home"></i><a href="/">Inicio</a></div>
                    <div class="menu-item"><i class="far fa-user-circle"></i><a>Perfil</a></div>
                </section>

                <section class="custom-menu__list" style="margin-top:50px;">
                    <span>Aplicaciones</span>
                    <div class="menu-item"><i class="far fa-comment-dots"></i><a>Chat</a></div>
                </section>
            </div>

            <div class="sidebar__bottom">
                <h5><b>Club Card</b></h5>
            </div>
        </nav>

        <!-- RIGHT CONTENT -->
        <div id="content">
            <!-- NAVBAR-TOP NAVIGATION -->
            <nav class="navbar navbar-expanded" style="background-color: #F5F7F9;">
                <div class="container-fluid">
                    <!-- NAVBAR HEADER -->
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-light">
                            <i class="fa fa-bars"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>
                    </div>

                    <form class="form-group col-9 col-sm-9 col-md-9 col-lg-5 col-xl-5 me-auto mb-2 mb-lg-0" action="{{ route('buscar.show') }}" method="GET">
                        <input class="form-control form-control-lg nav-search" type="search" name="buscar" placeholder="Buscar" aria-label="Search">
                    </form>

                    <!-- USER PROFILE -->
                    <!-- d-none d-lg-block -->
                    <ul class="nav navbar-nav d-none d-lg-block">
                        <div class="user">
                            <div class="user__avatar">
                                <img class="rounded-circle" alt="100x100" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" data-holder-rendered="true">
                            </div>
                            <div class="user__details">
                                <span>Joseph García</span>
                                <span>Recetas: <b>0</b></span>
                            </div>
                        </div>
                    </ul>
                </div>
            </nav>

            <!-- PAGE CONTENT-->
            <div id="page-content" class="container-fluid" style="padding: 20px 20px 20px;">
                <!-- CATEGORY NAVBAR -->
                <nav class="navbar navbar-expand-md navbar-categories">
                    @foreach ($categorias as $categoria)
                    <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorias.show', ['categoriaReceta' => $categoria->id]) }}">
                                {{ $categoria->nombre }}
                            </a>
                        </li> -->
                    <a href="{{ route('categorias.show', ['categoriaReceta' => $categoria->id]) }}">
                        <div class="category-card">
                            <i class="fas fa-utensils"></i>
                            <br>
                            <span class="category-card__title">{{ $categoria->nombre }}</span>
                        </div>
                    </a>
                    @endforeach
                </nav>

                <!-- CONTENT INJECTION -->
                @yield("content")
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    @yield('script')
</body>

</html>