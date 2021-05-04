 @extends('layouts.app')

 @section('content')
     <div class="container">
         <div class="row">
             <div class="col col-lg-4 d-none d-lg-block invisible">
                 <div class="filters rounded-lg">
                     <div class="filter-div">
                         <p class="filter-title">Dimensión</p>
                         <div class="dropdown"><button class="btn btn-primary dropdown-toggle dropdown-button-filter"
                                 aria-expanded="false" data-toggle="dropdown" type="button" style="width: 248.25px;">Sin
                                 filtro</button>
                             <div class="dropdown-menu"><a class="dropdown-item" href="#">2D</a><a class="dropdown-item"
                                     href="#">3D</a></div>
                         </div>
                     </div>
                     <div class="filter-div">
                         <p class="filter-title">Tipo de Formato</p>
                         <div class="dropdown"><button class="btn btn-primary dropdown-toggle dropdown-button-filter"
                                 aria-expanded="false" data-toggle="dropdown" type="button" style="width: 248.25px;">Sin
                                 filtro</button>
                             <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a
                                     class="dropdown-item" href="#">Second Item</a></div>
                         </div>
                     </div>
                     <div class="filter-div">
                         <p class="filter-title">Limpiar Filtros&nbsp;&nbsp;<button class="btn btn-secondary rounded-circle"
                                 id="clear-filters" type="button"
                                 style="height: 25px;width: 25px;font-size: 10px;">X</button></p>
                     </div>
                     <div class="text-right"><button class="btn btn-primary" type="button">Aplicar filtros</button></div>
                 </div>
             </div>
             <div class="col col-12 col-lg-8">
                 <div class="d-flex section"><span id="result-coinc" class="mr-auto">{{ $Publications->count() }}
                         Coincidencias con tu búsqueda.</span>
                     <div class="dropdown"><button class="btn btn-primary dropdown-toggle dropdown-button-filter d-none"
                             aria-expanded="false" data-toggle="dropdown" id="dropdown-sort-filter" type="button"
                             style="width: 125px;">Dropdown </button>
                         <div class="dropdown-menu"><a class="dropdown-item" href="#">Ascendiente</a><a
                                 class="dropdown-item" href="#">Descendiente</a></div>
                     </div>
                 </div>
                 <!-- Aqui -->
                 @if ($Publications->isNotEmpty())
                     @foreach ($Publications as $Publication)
                         <div class="result-link"
                             onclick="window.location='{{ route('publications.detailPage', $Publication->id) }}'">
                             <div class="result-card-item text-left d-sm-flex mb-4">
                                 <div class="result-img"
                                     style="background: url(/publications/images/{{ $Publication->id }}) center / cover no-repeat;">
                                 </div>
                                 <div class="result-card-content d-flex flex-column">
                                     <div class="d-sm-flex">
                                         <div class="mb-3 mb-sm-0">
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
                                         <div class="vertical-separator d-none d-sm-block invisible"></div>
                                         <div class="d-none">
                                             <p class="result-card-pago-title">Pago Aproximado</p>
                                             <p class="result-card-item-cost">$1300</p>
                                         </div>
                                     </div>
                                     <div>
                                         <p class="limited-text">{{ $Publication->desc }}<br></p>
                                     </div>
                                     <div class="horizontal-separator"></div>
                                     <div class="d-sm-flex align-items-center"><span
                                             class="result-card-item-published">Publicado por:</span>
                                         <div class="d-flex align-items-center pub-user">
                                             <div class="rounded-circle circle-image"
                                                 style="background:url(/users/profile_images/{{ $Publication->user_id }}) center / cover no-repeat;">
                                             </div>
                                             <span>{{ $Publication->full_name }}</span>
                                         </div>
                                         <div class="ml-auto text-right">
                                             <a class="text-white" target="_blank" href="{{ $Publication->url }}">
                                                 <div class="btn-download text-center"><span>Descargar</span></div>
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 @else
                     <div class="container">
                         <div class="row mb-3">
                             <div class="col-md-12 d-flex justify-content-center">
                                 <lottie-player src="https://assets4.lottiefiles.com/datafiles/vhvOcuUkH41HdrL/data.json"
                                     background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                                 </lottie-player>
                             </div>
                         </div>
                         <div class="row mb-3">
                             <div class="col-md-12">
                                 <h3 class="text-center font-weight-bolder"> Sin resultados, puedes apoyar este proyecto
                                     publicando un recurso
                                 </h3>
                             </div>
                         </div>
                     </div>
                 @endif
                 <!-- Hasta Aqui -->

                 <div class="d-flex justify-content-end mb-5">
                     <nav>
                         {{ $Publications->links() }}
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 @endsection
