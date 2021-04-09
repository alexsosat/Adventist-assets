@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex flex-column align-items-center">
                    <div class="rounded-circle big-user-circle mb-3"
                        style="background: url({{ $User->user_image }}) center / cover no-repeat;"></div>
                    <h2>{{ $User->name . ' ' . $User->surname }}</h2>
                    <div class="horizontal-separator w-100"></div>
                </div>
                <div class="mb-4">
                    <a class="user-link" href="{{ route('users.show', $User->id) }}">
                        <p>Información&nbsp;</p>
                    </a>
                    <a class="user-link" href="{{ route('users.publications', $User->id) }}">
                        <p>Publicaciones&nbsp;</p>
                    </a>
                </div>
                <a class="d-flex justify-content-between text-blue user-logout align-items-center"
                    onclick='event.preventDefault();document.getElementById("logout-form").submit();'
                    href="{{ route('logout') }}">
                    <form id=" logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <span class="cerrar">Cerrar Sesión&nbsp;</span><i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <div class="col col-md-8">
                <div class="user-info-pane">
                    <div class="mb-3">
                        <h2 class="text-grey">Información General</h2>
                        <div class="horizontal-separator w-100"></div>
                        <form method="post" action="{{ route('users.update', $User->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class=" form-group">
                                <label for="name">Nombre(s):</label>
                                <input id="name" class="form-control form-control @error('name') is-invalid @enderror"
                                    type="text" name="name" value="{{ $User->name }}" required autocomplete="name"
                                    autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="surname">Apellido(s):</label>
                                <input id="surname" class="form-control form-control @error('surname') is-invalid @enderror"
                                    type="text" name="surname" value="{{ $User->surname }}" required
                                    autocomplete="surname" autofocus>
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico:</label>
                                <input id="email" class="form-control form-control @error('email') is-invalid @enderror"
                                    type="email" name="email" value={{ $User->email }} required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mr-3" for="user_image">Imagen de perfil:</label>
                                <input class="form-control-file" type="file" name="user_image">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary search-button" type="submit">Guardar cambios</button>
                            </div>
                        </form>

                    </div>
                    <div>
                        <h2 class="text-grey">Seguridad</h2>
                        <div class="horizontal-separator w-100"></div>
                        <form method="post" action="{{ route('users.updatePassword', $User->id) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="password">Nueva contraseña</label>
                                <input class="form-control form-control @error('password') is-invalid @enderror"
                                    type="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Repetir contraseña</label>
                                <input class="form-control " id="password-confirm" type="password"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary search-button" type="submit">Guardar cambios</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
