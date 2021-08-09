@extends('layouts.auth')

@section('auth')

    <div class="container h-100 mt-3">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <a href="{{ route('inicio.index') }}">
                            <img src="{{ asset('images/logo.png') }}" class="brand_logo" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        {{-- email --}}
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>
                            <input id="email" type="email" placeholder="Email"
                                class="form-control input_user @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="custom-control-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" class="btn login_btn">
                                {{ __('Login') }}
                            </button>


                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-center enlaces_auth">
                        Aún no tienes una cuenta? <a href="{{ route('register') }}" class="ml-2 btn-link">Registrate</a>
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
