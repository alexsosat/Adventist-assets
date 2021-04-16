@extends('layouts.app')
@section('content')
<div class="container mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-bold">{{ $Publication->title }}<br></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col col-md-8 col-12">
                <div class="mb-3"><!--Carousel Wrapper-->
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
    @foreach ($Imagenes as $Imagen)
        <div class="carousel-item @if ($loop->index==0) active @endif">
            <div class="d-block slide-image" style="background:url('/images/{{ $Imagen->id  }}') center / contain no-repeat;"></div>
        </div>
    @endforeach   
    </div><a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
    <ol class="carousel-indicators">
    @foreach ($Imagenes as $Imagen)
        <li data-target="#carousel-thumb" data-slide-to="{{$loop->index}}" class="active  mb-3 mr-3">
            <div class="d-block slide-control" style="background:url('/images/{{ $Imagen->id  }}') center / cover no-repeat;"></div>
        </li>
    @endforeach 
    </ol>
</div>
    <!--/.Carousel Wrapper-->
</div>
                <div class="d-flex mx-3 justify-content-center mb-5">
                    <div class="d-flex align-items-center mr-3"><i class="fa fa-cubes icon icon-blue"></i><span class="font-weight-bolder">{{ $Publication->dimName }}</span></div>
                    <div class="d-flex align-items-center"><i class="far fa-file icon icon-blue"></i><span class="font-weight-bolder">{{ $Publication->formName }}</span></div>
                </div>
                <div>
                    <p>{{ $Publication->desc }}<br></p>
                    <p><br></p>

                </div>
            </div>
            <div class="col col-12 col-md-4">
                <div class="user-detail-banner rounded d-flex flex-column align-items-center p-3 mb-3">
                    <div class="rounded-circle big-user-circle mb-3" style="background: url(/users/profile_images/{{ $Publication->user_id }}) center/ contain no-repeat;"></div>
                    <h4 class="mb-1">{{ $Publication->full_name }}<br></h4><span>{{ $Publication->email }}</span>
                </div>
                <div><a class="btn btn-primary btn-lg btn-download w-100 btn-big" href="{{ $Publication->url }}" target="_blank" role="button">Descargar modelo</a></div>
            </div>
        </div>
    </div>
@endsection
