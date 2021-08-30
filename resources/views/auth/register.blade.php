@extends('layouts.auth')

@section('auth')
<div class="container h-100 mt-3">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card_register">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <a href="{{ route('inicio.index') }}">
                        🥡
                    </a>
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    {{-- name --}}
                    <div class="input-group mb-3">
                        <input id="name" placeholder="Nombre" type="text" class="form-control input_user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- email --}}
                    <div class="input-group mb-3">

                        <input id="email" type="email" placeholder="ejemplo@dominio.com" class="form-control input_user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- password --}}
                    <div class="input-group mb-2">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control input_pass @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- repeat password --}}
                    <div class="input-group mb-2">
                        <input id="password-confirm" type="password" class="form-control input_pass" placeholder="Contraseña" name="password_confirmation" required autocomplete="new-password">
                    </div>


                    {{-- url --}}
                    <div class="input-group mb-3">
                        <input id="url" type="url" class="form-control input_user @error('url') is-invalid @enderror" placeholder="http://ejemplo.com" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>
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
                    ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="ml-2 btn-link" ><span class="login"><b>Inicia Sesión</b></span></a>
                </div>
                <!-- <div class="d-flex justify-content-center enlaces_auth">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link forgot_password" href="{{ route('password.request') }}">
                       <b>{{ __('Forgot Your Password?') }}</b>
                    </a>
                    @endif
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection