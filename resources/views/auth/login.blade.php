@extends('layouts.auth')

@section('auth')

@error('email')
<div class="alert alert-danger fixed-top" role="alert">
    <strong>{{ $message }}</strong>
</div>
@enderror


@error('password')
<div class="alert alert-danger fixed-top" role="alert">
    <strong>{{ $message }}</strong>
</div>
@enderror

<div class="container h-100 mt-3">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <!-- BRAND LOGO -->
                <div class="brand_logo_container">
                    <a href="{{ route('inicio.index') }}">
                        <!-- <img src="{{ asset('images/logo2.png') }}" class="brand_logo" alt="Logo"> -->
                        🥡
                    </a>
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    {{-- email --}}
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="Email" class="form-control input_user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>

                    {{-- password --}}
                    <div class="input-group mb-2">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control input_pass @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label remember" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" class="btn login_btn">{{ __('Login') }}</button>
                    </div>
                </form>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-center enlaces_auth">
                    ¿Aún no estás registrado?<a href="{{ route('register') }}" class="ml-2 btn-link"><span class="register"><b>Registrate</b></span></a>
                </div>
                <!-- <div class="d-flex justify-content-center enlaces_auth">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link forgot_password" href="{{ route('password.request') }}"><b>{{ __('Forgot Your Password?') }}</b></a>
                    @endif
                </div> -->
            </div>
        </div>
    </div>
</div>

@endsection