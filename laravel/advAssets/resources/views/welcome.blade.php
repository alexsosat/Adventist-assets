@extends('layouts.app')

@section('content')
    <header>
        <div class="container">
            <div class="row">
                <div
                    class="col-md-6 d-md-flex d-lg-flex d-xl-flex flex-column justify-content-md-center justify-content-lg-center justify-content-xl-center">
                    <h1 id="heading" style="font-size: 56px;">Adv. Assets</h1>
                    <p style="font-size: 24px;">El centro de recursos adventistas. Proveyéndote recursos para expandir el
                        amor de Dios a todos los rincones de la Tierra.<br></p>
                    <div id="main-search-bar" class="rounded px-3 pt-3 pb-2 w-100">
                        <form class="d-flex flex-column flex-sm-row justify-content-between align-items-center"><input
                                class="form-control w-100" type="text" placeholder="Nombre a buscar" name="key-words">
                            <div class="mr-3 d-none d-sm-block"></div>
                            <div class="mb-2 d-block d-sm-none"></div><button
                                class="btn btn-primary search-button w-50 align-self-center" type="submit"><i
                                    class="fa fa-search"></i>&nbsp;Buscar</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6"><img src="{{ asset('img/header_picture.svg') }}"></div>
            </div>
        </div>
    </header>
@endsection
