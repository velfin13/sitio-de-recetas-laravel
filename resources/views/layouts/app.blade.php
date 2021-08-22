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
                    <div class="menu-item"><i class="fas fa-home"></i><a>Inicio</a></div>
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

                    <form class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <input class="form-control form-control-lg nav-search" type="search" placeholder="Buscar" aria-label="Search">
                    </form>

                    <!-- TOGLER MENU -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="nav navbar-nav">
                            <li style="color: black;"><a href="#">Link</a></li>
                            <li style="color: black;"><a href="#">Link</a></li>
                            <li style="color: black;"><a href="#">Link</a></li>
                            <li style="color: black;"><a href="#">Link</a></li>
                            <li style="color: black;"><a href="#">Link</a></li>
                        </div>
                    </div>

                    <!-- USER PROFILE -->
                    <!-- d-none d-lg-block -->
                    <ul class="nav navbar-nav navbar-right ">
                        <!-- <div class="search">
                            <button type="button" id="sidebarCollapse" class="btn btn-light">
                                <i class="fas fa-search"></i>
                                <span class="sr-only">Toggle Menu</span>
                            </button>
                        </div> -->
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

            <!-- PAGE CONTENT -->
            <div id="page-content" class="container-fluid" style="padding: 20px 20px 20px;">
                <h2 class="mb-4">Sidebar #02</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    @yield('script')
</body>

</html>
