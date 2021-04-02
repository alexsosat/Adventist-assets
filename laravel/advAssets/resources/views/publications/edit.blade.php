@extends('layouts.app')
@section('content')
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <h1><strong>Editar Publicación</strong></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-clean">
                    <form method="post" action="{{ route('publications.update', $Publication->pubId) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label class="font-weight-bold" for="title">Título de la publicación<br></label>
                            <input class="form-control rounded-lg @error('title') is-invalid @enderror" type="text"
                                name="title" required autocomplete="title" autofocus value="{{ $Publication->title }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="url">url de descarga</label>
                            <input class="form-control rounded-lg @error('url') is-invalid @enderror" type="text" name="url"
                                required autocomplete="url" autofocus value="{{ $Publication->url }}">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-6 mb-3">
                                <label class="font-weight-bold" for="dimension">Dimensiones</label>
                                <input class="d-none form-control rounded-lg @error('dimension') is-invalid @enderror"
                                    id="dropdown-dim-input" type="text" name="dimension" required autocomplete="dimension"
                                    autofocus value="{{ $Publication->dimension }}">
                                @error('dimension')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="dropdown">
                                    <button
                                        class="btn btn-primary dropdown-toggle btn-block text-left dropdown-button-filter"
                                        aria-expanded="false" data-toggle="dropdown" id="dropdown-dim-val"
                                        type="button">{{ $Publication->dimName }}</button>
                                    <div class="dropdown-menu" id="dropdown-dim">
                                        @foreach ($Dimensions as $Dimension)
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault();changeDropdownText('dropdown-dim-val','{{ $Dimension->name }}','dropdown-dim-input',{{ $Dimension->id }})">{{ $Dimension->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="font-weight-bold" label="format">Formato</label>
                                <input class="d-none form-control rounded-lg @error('format') is-invalid @enderror"
                                    id="dropdown-type-input" type="text" name="format" required autocomplete="format"
                                    autofocus value="{{ $Publication->format }}">
                                @error('format')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="dropdown">
                                    <button
                                        class="btn btn-primary dropdown-toggle btn-block text-left dropdown-button-filter"
                                        aria-expanded="false" data-toggle="dropdown" id="dropdown-type-val"
                                        type="button">{{ $Publication->formName }}</button>
                                    <div class="dropdown-menu dropdown-type">
                                        @foreach ($Formats as $Format)
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault();changeDropdownText('dropdown-type-val','{{ $Format->name }}','dropdown-type-input',{{ $Format->id }})">{{ $Format->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="description">Descripción</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="10"
                                name="description" required autocomplete="description"
                                autofocus>{{ $Publication->desc }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group files color mb-4">
                            <div>
                                <label class="font-weight-bold" for="files">Imágenes</label>
                                <input class="form-control-file" type="file" multiple name="files">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block search-button mb-3" type="submit">Publicar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
