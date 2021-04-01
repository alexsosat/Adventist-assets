@extends('layouts.app')

@section('content')

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <img class="mx-3" src="{{ asset('img/logo-nav.svg') }}">
                    <h1 class="text-blue font-weight-bold mb-3 text-center my-auto">Adv. Assets<br></h1>
                </div>
                <h3 class="text-center"><strong>Comienza a publicar tus recursos&nbsp;</strong><br><strong>rápido, fácil y
                        seguro</strong><br></h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-clean">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 class="font-weight-bold text-hover mb-3">Iniciar Sesión<br></h1>
                        <div class="form-group">
                            <label class="font-weight-bold" for="email">Correo
                                Electrónico<br></label>
                            <input class="form-control rounded-lg @error('email') is-invalid @enderror" type="email"
                                name="email" id="email" placeholder="Correo Electrónicio" value="{{ old('email') }}"
                                required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group"><label class="font-weight-bold" for="password">Contraseña</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" id="password" placeholder="Contraseña" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <a class="d-none" href="#">Olvidaste tu contraseña?</a>
                        <button class="btn btn-primary btn-block search-button mb-3" type="submit">Ingresar</button>
                        <p class="text-center text-hover"><a href="{{ route('register') }}">¿Aún no estas registrado?
                                Regístrate y
                                comienza a publicar<br></a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
