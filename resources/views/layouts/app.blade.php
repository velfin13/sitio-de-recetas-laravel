<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('inicio.index') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">


<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 8e7fb0524b3d60943726838590f5a5eba26a4e43
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (!Auth::user()->perfil->imagen)
                                <span class="mr-2 d-none d-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                @else
                                <img class="img-profile rounded-circle" style="height: 40px;width: 40px;" src="{{ '/storage/' . Auth::user()->perfil->imagen }}">
<<<<<<< HEAD
=======
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (!Auth::user()->perfil->imagen)
                                        {{-- nombre usuario --}}
                                        <span
                                            class="mr-2 d-none d-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                        {{-- imagen del usuario --}}
                                        <img class="img-profile rounded-circle" style="height: 40px;width: 40px;"
                                            src="https://icon-library.com/images/no-profile-picture-icon/no-profile-picture-icon-2.jpg"
                                            alt="{{ Auth::user()->name }}">
                                    @else
                                        {{-- nombre usuario --}}
                                        <span
                                            class="mr-2 d-none d-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                        {{-- imagen del usuario --}}
                                        <img class="img-profile rounded-circle" style="height: 40px;width: 40px;"
                                            src="{{ '/storage/' . Auth::user()->perfil->imagen }}"
                                            alt="{{ Auth::user()->name }}">
>>>>>>> 3ff141c9e3bd0a0a1ef80d11559aa86b1cbad202
=======
>>>>>>> 8e7fb0524b3d60943726838590f5a5eba26a4e43

                                @endif


                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('perfiles.show', ['perfil' => Auth::user()->id]) }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ __('Perfil') }}
                                </a>

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 8e7fb0524b3d60943726838590f5a5eba26a4e43
                                <a class="dropdown-item" href="{{ route('recetas.index') }}">
                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                    {{ __('Ver Recetas') }}
                                </a>


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
<<<<<<< HEAD
=======
                                    <a class="dropdown-item"
                                        href="{{ route('perfiles.edit', ['perfil' => Auth::user()->id]) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        {{ __('Editar Perfil') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('recetas.index') }}">
                                        <i class="fa fa-cutlery" aria-hidden="true"></i>
                                        {{ __('Ver Recetas') }}
                                    </a>


                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal"
                                        data-target="#logoutModal"
                                        onclick="event.preventDefault();
                                                                                                document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
>>>>>>> 3ff141c9e3bd0a0a1ef80d11559aa86b1cbad202
=======
>>>>>>> 8e7fb0524b3d60943726838590f5a5eba26a4e43
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        {{-- buscador --}}
        @yield('hero')

        <nav class="navbar navbar-expand-md categorias-bg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categorias" aria-controls="categorias" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    Categorias
                </button>
                <div class="collapse navbar-collapse " id="categorias">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav w-100 d-flex justify-content-between">
                        @foreach ($categorias as $categoria)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorias.show', ['categoriaReceta' => $categoria->id]) }}">
                                {{ $categoria->nombre }}
                            </a>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>

        {{-- seccion de botones --}}
        <div class="container">

            <div class="py-1 mt-4 ml-5 col-12">
                @yield('botones')
            </div>

            <main class="py-4 mt-1 col-12">
                @yield('content')
            </main>
        </div>

    </div>
    @yield('script')
</body>

</html>