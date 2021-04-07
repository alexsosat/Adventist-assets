@extends('layouts.app')
@section('content')
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <h1><strong>Crear Publicación</strong></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-clean">
                    <form method="post" action="{{ route('publications.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" name="user_id" value='{{ Auth::user()->id }}'>

                        <div class="form-group">
                            <label class="font-weight-bold" for="title">Título de la publicación<br></label>
                            <input class="form-control rounded-lg @error('title') is-invalid @enderror" type="text"
                                name="title" required autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="url">url de descarga</label>
                            <input class="form-control rounded-lg @error('url') is-invalid @enderror" type="text" name="url"
                                required autocomplete="url" autofocus>
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
                                    autofocus>
                                @error('dimension')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="dropdown">
                                    <button
                                        class="btn btn-primary dropdown-toggle btn-block text-left dropdown-button-filter"
                                        aria-expanded="false" data-toggle="dropdown" id="dropdown-dim-val"
                                        type="button">Escoge la dimensión</button>
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
                                    autofocus>
                                @error('format')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="dropdown">
                                    <button
                                        class="btn btn-primary dropdown-toggle btn-block text-left dropdown-button-filter"
                                        aria-expanded="false" data-toggle="dropdown" id="dropdown-type-val"
                                        type="button">Escoge el formato</button>
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
                                name="description" autocomplete="description" autofocus></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="visual_archive">Archivo de visualizacion:
                                (obj,fbx,stl,dae,ply,gltf)</label>
                            <input class="form-control-file @error('visual_archive') is-invalid @enderror" type="file"
                                name="visual_archive" autocomplete="visual_archive" autofocus>
                        </div>
                        <div class="form-group files color mb-4">
                            <div>
                                <label class="font-weight-bold" for="files[]">Imágenes</label>
                                <input class="form-control-file @error('files.*') is-invalid @enderror" type="file" multiple
                                    name="files[]" autocomplete="files[]" autofocus>
                                @error('files.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block search-button mb-3" type="submit">Publicar recurso</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
