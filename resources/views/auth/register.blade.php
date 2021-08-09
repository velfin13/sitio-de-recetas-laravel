@extends('layouts.auth')

@section('auth')
    <div class="container h-100 mt-3">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card_register">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <a href="{{ route('inicio.index') }}">
                            <img src="{{ asset('images/logo.png') }}" class="brand_logo" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        {{-- name --}}
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>

                            <input id="name" placeholder="Nombre" type="text"
                                class="form-control input_user @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- email --}}
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>

                            <input id="email" type="email" placeholder="Correo electronico"
                                class="form-control input_user @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- password --}}
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></i></span>
                            </div>

                            <input id="password" type="password" placeholder="Contraseña"
                                class="form-control input_pass @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- repeat password --}}
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></i></span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control input_pass"
                                placeholder="Repite la contraseña" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>


                        {{-- url --}}
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-link" aria-hidden="true"></i></span>
                            </div>
                            <input id="url" type="url" class="form-control input_user @error('url') is-invalid @enderror"
                                placeholder="url de tu sitio web" name="url" value="{{ old('url') }}" required
                                autocomplete="url" autofocus>

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container">

                            <button type="submit" class="btn login_btn">
                                {{ __('Register') }}
                            </button>

                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-center enlaces_auth">
                        Ya tienes una cuenta? <a href="{{ route('login') }}" class="ml-2 btn-link">Inicia Sesión</a>
                    </div>
                    <div class="d-flex justify-content-center enlaces_auth">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
