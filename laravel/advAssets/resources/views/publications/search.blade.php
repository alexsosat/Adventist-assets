@extends('layouts.app')
@section('content')


    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-3"><strong>Buscar Recurso</strong></h1>
                <h4 class="text-center">Encuentra el recurso ideal para tus proyectos</h4>
            </div>
        </div>
    </div>
    <section class="search-section mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="w-100">
                        <form class="d-flex w-100 align-items-center justify-content-center flex-column flex-sm-row"
                            method="post"><input class="form-control rounded w-100 form-control" type="text"
                                placeholder="Palabras clave">
                            <div class="my-2 d-block d-sm-none"></div>
                            <div class="mx-3 d-none d-sm-block"></div><button
                                class="btn btn-primary search-button btn-block" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--foreach-->

    @foreach ($Publications as $Publication)

        @if ($loop->index % 3 === 0)
            <div class="container mb-5">
                <div class="row">
        @endif

        <div class="col-md-4">
            <div class="recent-item"><a class="search-item"
                    href="{{ route('publications.detailPage', $Publication->id) }}">
                    <div class="recent-item-img"
                        style="background: url(/publications/images/{{ $Publication->id }}) center / cover no-repeat;">
                    </div>
                    <h4 class="p-3 font-weight-bold">{{ $Publication->title }}</h4>
                    <div class="d-flex pb-2">
                        <div class="result-card-item-filter"><i
                                class="fas fa-cubes icon"></i><span>{{ $Publication->dimensionId }}</span></div>
                        <div class="result-card-item-filter"><i
                                class="far fa-file icon"></i><span>{{ $Publication->formatId }}</span></div>
                    </div>
                </a></div>
        </div>

        @if ($loop->index === 2 || $loop->index === 5 || $loop->index === 8 || $loop->index === 11)
            </div>
            </div>
        @endif

    @endforeach
    <!--endforeach-->


@endsection
