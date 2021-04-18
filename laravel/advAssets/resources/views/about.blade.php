 @extends('layouts.app')

 @section('content')
     <div class="container">
         <div class="row align-items-center">
             <div class="col col-12 col-lg-5">
                 <div>
                     <h1 class="page-title" style="font-family: Merriweather, serif;">Acerca de nosotros</h1>
                     <p>Somos un grupo de alumnos el cual vio la necesidad de crear esta página web para ayudar a la
                         comunidad con su necesidad actual.</p>
                 </div>
             </div>
             <div class="col col-12 col-lg-7">
                 <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_spvnlrri.json" background="transparent"
                     speed="1" style="width: 100%; height: 100%;" loop autoplay>
             </div>

         </div>
     </div>
     <section class="team-boxed">
         <div class="container">
             <div class="intro">
                 <h2 class="text-center" style="font-family: Merriweather, serif;">Nuestro equipo</h2>
                 <p class="text-center">Desarrollado por alumnos de la universidad de Montemorelos, N.L.</p>
             </div>
             <div class="row d-lg-flex d-xl-flex justify-content-lg-center justify-content-xl-center people">
                 <div class="col-md-6 col-lg-4 item">
                     <div class="box shadow rounded"><img class="rounded-circle" src="{{ asset('img/Alejandro.jpg') }}">
                         <h3 class="name">Alejandro Sosa</h3>
                         <p class="title">Ingeniero en Sistemas</p>
                         <p class="description">Ingeniero enfocado en el área de desarrollo de videojuegos y desarrollo
                             móvil. Actualmente trabajando para el área de sistemas en la Universidad de Montemorelos.</p>
                         <div class="social">
                             <a href="https://www.facebook.com/alejandro.trejo.1069/" target="_blank">
                                 <i class="fab fa-facebook-f"></i>
                             </a>
                             <a href="https://twitter.com/AlexAlexsosat" target="_blank">
                                 <i class="fab fa-twitter"></i>
                             </a>
                             <a href="https://www.instagram.com/alexsosat/" target="_blank">
                                 <i class="fab fa-instagram"></i>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-lg-4 item">
                     <div class="box shadow rounded"><img class="rounded-circle" src="{{ asset('img/Miguel.jpg') }}">
                         <h3 class="name">Miguel Varela</h3>
                         <p class="title"><strong>INGENIERO EN SISTEMAS</strong><br></p>
                         <p class="description">Ingeniero ..... . Actualmente trabajando para el área de Emprendum en la
                             Universidad de Montemorelos.</p>
                         <div class="social"><a href="https://www.facebook.com/miguel.vareladelgado.3" target="_blank"><i
                                     class="fab fa-facebook-f"></i></a><a href="https://twitter.com/MiguelVarelaDe1"
                                 target="_blank"><i class="fab fa-twitter"></i></a><a
                                 href="https://www.instagram.com/m.vareladelgado/" target="_blank"><i
                                     class="fab fa-instagram"></i></a></div>
                     </div>
                 </div>
                 <div class="col-md-6 col-lg-4 item">
                     <div class="box shadow rounded"><img class="rounded-circle" src="{{ asset('img/Freddy.jpg') }}">
                         <h3 class="name">Freddy Santos</h3>
                         <p class="title"><strong>INGENIERO EN SISTEMAS</strong><br></p>
                         <p class="description">Ingeniero ..... . Actualmente trabajando para el área de Emprendum en la
                             Universidad de Montemorelos.</p>
                         <div class="social"><a href="https://www.facebook.com/fredy.santos.79069323" target="_blank"><i
                                     class="fab fa-facebook-f"></i></a><a href="https://www.instagram.com/_.freddysantos._/"
                                 target="_blank"><i class="fab fa-instagram"></i></a></div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 @endsection
