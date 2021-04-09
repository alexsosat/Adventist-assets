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
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        @foreach ($Imagenes as $Imagen)
        <div class="carousel-item active">
          <img class="d-block w-100" src="/images/{{ $Imagen->id  }}" alt="First slide">
        </div>
        @endforeach
      </div>
      <!--/.Slides-->
      <!--Controls-->
      <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->
      <ol class="carousel-indicators">
        @foreach ($Imagenes as $Imagen)     
        <li data-target="#carousel-thumb" data-slide-to="0" class="active mx-4 mb-3"> <img class="d-block" width="250%"  src="/images/{{ $Imagen->id  }}"
            class="img-fluid"></li>
        @endforeach
      </ol>
    </div>
    <!--/.Carousel Wrapper-->
</div>
                <div class="d-flex mx-3 justify-content-center mb-5">
                    <div class="d-flex align-items-center mr-3"><i class="fa fa-cubes icon icon-blue"></i><span class="font-weight-bolder">3 Dimensiones</span></div>
                    <div class="d-flex align-items-center"><i class="far fa-file icon icon-blue"></i><span class="font-weight-bolder">FBX</span></div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident<br></p>
                </div>
            </div>
            <div class="col col-12 col-md-4">
                <div class="user-detail-banner rounded d-flex flex-column align-items-center p-3 mb-3">
                    <div class="rounded-circle big-user-circle mb-3" style="background: url(&quot;assets/img/1.jpg&quot;) center/ contain no-repeat;"></div>
                    <h4 class="mb-1">Haylie Donin<br></h4><span>correo@gmail.com</span>
                </div>
                <div><a class="btn btn-primary btn-lg btn-download w-100 btn-big" role="button">Descargar modelo</a></div>
            </div>
        </div>
    </div>
@endsection
