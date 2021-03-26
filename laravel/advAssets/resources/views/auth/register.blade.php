@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_image"
                                    class="col-md-4 col-form-label text-md-right">{{ __('user image') }}</label>

                                <div class="col-md-6">
                                    <input id="user_image" type="file"
                                        class="form-control  @error('user_image') is-invalid @enderror" name="user_image"
                                        value="{{ old('user_image') }}" autofocus>

                                    @error('user_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Register nuestro -->

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center align-items-center mb-3"><img class="mx-3"
                        src="assets/img/logo-nav.svg">
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
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <h1 class="font-weight-bold text-hover mb-3">Registrate<br></h1>
                        <div class="form-group">
                            <label class="font-weight-bold" for="name">Nombre(s)<br></label>
                            <input class="form-control rounded-lg @error('name') is-invalid @enderror" type="text"
                                name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="surname">Apellido(s)</label>
                            <input class="form-control rounded-lg @error('surname') is-invalid @enderror" type="text"
                                name="surname" id="surname" value="{{ old('surname') }}" required autocomplete="surname"
                                autofocus>
                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input class="form-control rounded-lg  @error('email') is-invalid @enderror" type="email"
                                name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="password">Contraseña</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="password-confirm">Repetir Contraseña</label>
                            <input class="form-control rounded-lg" type="text" name="password-confirm" id="password-confirm"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <!-- vas aqui -->
                        <div class="form-group mb-5">
                            <label class="font-weight-bold" for="image-user">Imagen de
                                perfil</label>
                            <input class="form-control-file" type="file" name="image-user">
                        </div>
                        <a class="d-none" href="#">Olvidaste tu contraseña?</a><button
                            class="btn btn-primary btn-block search-button mb-3" type="submit">Registrarse</button>
                        <p class="text-center text-hover"><a href="login.html">¿Ya tienes una cuenta? Inicia sesión
                                aquí<br></a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
