<?php include 'conexion_bd.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Real State</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-lg-4 d-none d-lg-block invisible">
                <div class="filters rounded-lg">
                    <div class="filter-div">
                        <p class="filter-title">Dimensión</p>
                        <div class="dropdown"><button class="btn btn-primary dropdown-toggle dropdown-button-filter" aria-expanded="false" data-toggle="dropdown" type="button" style="width: 248.25px;">Sin filtro</button>
                            <div class="dropdown-menu"><a class="dropdown-item" href="#">2D</a><a class="dropdown-item" href="#">3D</a></div>
                        </div>
                    </div>
                    <div class="filter-div">
                        <p class="filter-title">Tipo de Formato</p>
                        <div class="dropdown"><button class="btn btn-primary dropdown-toggle dropdown-button-filter" aria-expanded="false" data-toggle="dropdown" type="button" style="width: 248.25px;">Sin filtro</button>
                            <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a></div>
                        </div>
                    </div>
                    <div class="filter-div">
                        <p class="filter-title">Limpiar Filtros&nbsp;&nbsp;<button class="btn btn-secondary rounded-circle" id="clear-filters" type="button" style="height: 25px;width: 25px;font-size: 10px;">X</button></p>
                    </div>
                    <div class="text-right"><button class="btn btn-primary" type="button">Aplicar filtros</button></div>
                </div>
            </div>
            <div class="col col-12 col-lg-8">
                <div class="d-flex section"><span id="result-coinc" class="mr-auto">5 Coincidencias con tu búsqueda.</span>
                    <div class="dropdown"><button class="btn btn-primary dropdown-toggle dropdown-button-filter" aria-expanded="false" data-toggle="dropdown" id="dropdown-sort-filter" type="button" style="width: 125px;">Dropdown </button>
                        <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
                    </div>
                </div>
                <div class="result-card-item text-left d-sm-flex mb-4">
                    <div class="result-img" style="background: url(&quot;assets/img/1.jpg&quot;) center / cover no-repeat;"></div>
                    <div class="result-card-content d-flex flex-column">
                        <div class="d-sm-flex">
                            <div class="mb-3 mb-sm-0">
                                <p class="result-item-title">La Capital, Departamentos en Renta<br></p>
                                <div class="d-flex">
                                    <div class="result-card-item-filter"><i class="fas fa-cubes icon"></i><span>3D</span></div>
                                    <div class="result-card-item-filter"><i class="far fa-file icon"></i><span>Obj</span></div>
                                </div>
                            </div>
                            <div class="vertical-separator d-none d-sm-block invisible"></div>
                            <div class="invisible">
                                <p class="result-card-pago-title">Pago Aproximado</p>
                                <p class="result-card-item-cost">$1300</p>
                            </div>
                        </div>
                        <div>
                            <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s ...<br></p>
                        </div>
                        <div class="horizontal-separator"></div>
                        <div class="d-sm-flex align-items-center"><span class="result-card-item-published">Publicado por:</span>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle circle-image"></div><span>Arlene Mccoy</span>
                            </div>
                            <div class="ml-auto text-right"><button class="btn btn-primary ml-auto rounded-pill btn-download" type="button">Descargar</button></div>
                        </div>
                    </div>
                </div>
                <div class="result-card-item text-left d-sm-flex mb-4">
                    <div class="result-img" style="background: url(&quot;assets/img/1.jpg&quot;) center / cover no-repeat;"></div>
                    <div class="result-card-content d-flex flex-column">
                        <div class="d-sm-flex">
                            <div class="mb-3 mb-sm-0">
                                <p class="result-item-title">La Capital, Departamentos en Renta<br></p>
                                <div class="d-flex">
                                    <div class="result-card-item-filter"><i class="fas fa-cubes icon"></i><span>3D</span></div>
                                    <div class="result-card-item-filter"><i class="far fa-file icon"></i><span>Obj</span></div>
                                </div>
                            </div>
                            <div class="vertical-separator d-none d-sm-block invisible"></div>
                            <div class="invisible">
                                <p class="result-card-pago-title">Pago Aproximado</p>
                                <p class="result-card-item-cost">$1300</p>
                            </div>
                        </div>
                        <div>
                            <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s ...<br></p>
                        </div>
                        <div class="horizontal-separator"></div>
                        <div class="d-sm-flex align-items-center"><span class="result-card-item-published">Publicado por:</span>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle circle-image"></div><span>Arlene Mccoy</span>
                            </div>
                            <div class="ml-auto text-right"><button class="btn btn-primary ml-auto rounded-pill btn-download" type="button">Descargar</button></div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-5">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <?php
    $qry = "SELECT * FROM `user` WHERE id_user = 1";
    $result_set = $conexion->query($qry); 


                 while($registro = $result_set->fetch_assoc()){
                  echo '<p>'.$registro['name'].'</p>';
                  
                } 

                   
                    $result_set->close();
                    mysqli_close($conexion); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>