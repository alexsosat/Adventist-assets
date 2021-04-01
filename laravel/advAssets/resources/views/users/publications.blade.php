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
                <div class="user-pub-pane">
                    <div class="mb-3">
                        <h2 class="text-grey">Tus publicaciones</h2>
                        <div class="horizontal-separator w-100"></div>
                    </div>
                    <!-- de aqui -->
                    @foreach ($Publications as $Publication)
                        <div class="result-card-item text-left d-sm-flex mb-4">
                            <div class="result-img"
                                style="background: url({{ $Publication->image_file }}) center / cover no-repeat;"></div>
                            <div class="result-card-content d-flex flex-column">
                                <div class="d-sm-flex">
                                    <div class="mb-3 mb-sm-0 w-100">
                                        <p class="result-item-title">{{ $Publication->title }}<br></p>
                                        <div class="d-flex">
                                            <div class="result-card-item-filter"><i
                                                    class="fas fa-cubes icon"></i><span>{{ $Publication->dimensionId }}</span>
                                            </div>
                                            <div class="result-card-item-filter"><i
                                                    class="far fa-file icon"></i><span>{{ $Publication->formatId }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="limited-text">{{ $Publication->desc }}<br>
                                    </p>
                                </div>
                                <div class="horizontal-separator"></div>
                                <div class="d-flex justify-content-around flex-column flex-sm-row">
                                    <a class="btn-ver mb-2" href="DetailPage.html">
                                        <i class="fas fa-eye mr-1"></i>
                                        <span>Ver</span>
                                    </a>
                                    <a class="btn-editar mb-2" href="createPage.html">
                                        <i class="fas fa-edit mr-1"></i>
                                        <span>Editar</span>
                                    </a>
                                    <a class="btn-borrar mb-2" href="#"
                                        onclick="event.preventDefault();if(confirm('Estas seguro de eliminar esta publicación?')){document.getElementById('delete-pub-{{ $Publication->id }}').submit();}">
                                        <i class=" fas fa-trash mr-1"></i>
                                        <span>Eliminar</span>

                                        <form id="delete-pub-{{ $Publication->id }}"
                                            action="{{ route('publications.delete', $Publication->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- hasta aqui -->

                    <div class="d-flex justify-content-end">
                        <nav>
                            {{ $Publications->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
