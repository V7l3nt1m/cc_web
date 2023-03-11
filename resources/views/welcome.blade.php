<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Caridade Cristã</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts-->
    <!-- Swiper slider-->
    <link rel="stylesheet" href="/assets1/vendor/swiper/swiper-bundle.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/assets1/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/assets1/css/custom.css">
    <link rel="stylesheet" href="otherstyle.css">

    <!-- Favicon-->
    <link rel="shortcut icon" href="/assets1/img/logocc.png">
  </head>

  

  <body class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="0" tabindex="0">
    <!-- navbar-->
    <div id="preloader"></div>
   

    <header class="header">
      <nav class="navbar navbar-expand-lg navbar-dark position-absolute w-100" id="navbar">
        <div class="container"><a class="navbar-brand d-block d-lg-none" href="#!"><img src="/assets1/img/logoccblack.png" alt="..." width="60"></a>
          <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#services">Mesa</a></li>
              @auth
              <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
              @endauth
              @guest
              <li class="nav-item"><a class="nav-link" href="/login">Entrar</a></li>
              @endguest
               

            </ul>
            <ul class="navbar-nav d-none d-lg-block px-4">
              <li class="nav-item m-0"><a class="navbar-brand m-0" href="/"><img src="/assets1/img/logo.png" alt="..." width="80"></a></li>
            </ul>
            <ul class="navbar-nav me-auto">
              <li class="nav-item"><a class="nav-link" href="#sermons">Histórico</a></li>
              <li class="nav-item"><a class="nav-link" href="#works">Liturgia</a></li>
              @auth
              <form action="/logout" method="POST">
                @csrf
              <li class="nav-item"><a class="nav-link" href="/logout" onclick="event.preventDefault();
                this.closest('form').submit();">Sair</a></li>
              </form>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Hero Slider -->
    <section class="text-center pt-lg-0 hero-home" id="hero">
      <div class="swiper hero-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide hero-slide bg-cover bg-center py-5 with-border-image d-flex align-items-center caridade-img" style="background: url(/assets1/img/caridade1.jpg)">
            <div class="container text-white py-5 my-5 index-forward">
              <h1 class="text-uppercase text-xl mt-5">Lema</h1>
              <div class="row">
                <div class="col-lg-7 mx-auto">
                  <p class="lead">Colher Para Servir. Quem Não Colher Para Servir, Não Servirá Para Viver</p><a class="btn btn-primary px-4" href="">Ver Mais</a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide hero-slide bg-cover bg-center py-5 with-border-image d-flex align-items-center caridade-img" style="background: url(/assets1/img/caridade2.jpg)">
            <div class="container text-white py-5 my-5 index-forward">
              <h1 class="text-uppercase text-xl mt-5">SubLema</h1>
              <div class="row">
                <div class="col-lg-7 mx-auto">
                  <p class="lead">Nosso Amigo É Aquele Que Nos Diz Vamos e Não Aquele que Nos Diz Vai</p><a class="btn btn-primary px-4" href="">Ver Mais</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-next swiper-nav-custom d-none d-lg-block"></div>
        <div class="swiper-button-prev swiper-nav-custom d-none d-lg-block"></div>
        <div class="swiper-pagination py-3 d-block d-lg-none"></div>
      </div>
    </section>
    <!-- Features Section-->
    
    <!-- Services Section -->
    <section class="py-5" id="services">
      <div class="container py-5">
        <header class="mb-4 text-center mb-5">
          <h2 class="text-uppercase">Mesa Directiva</h2>
        </header>
        <div class="row text-center gy-4">
          <div class="col-lg-3"><i class="fas text-primary mb-4 fa-3x fa-church"></i>
            <h3 class="h5">{{--$admins->permissao--}}</h3>

            <div class="card" style="width: 18rem;">
                <img src="/photos/{{--$admins->photo--}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">{{--$admins->name--}}</p>
                </div>
              </div>
          </div>
         
        </div>
      </div>
    </section>
    <!-- Works Section-->
    <section id="works">
      <div class="container-fluid px-0">
        <div class="row align-items-stretch">
          <div class="col-lg-6 half-page-banner bg-cover" style="background: url(img/priest.jpg)"></div>
          <div class="col-lg-6 bg-light py-lg-5">
            <div class="h-100 d-flex flex-column p-5 justify-content-center">
              <p class="text-serif text-primary mb-0">Liturgia Diária</p>
              <h2 class="text-uppercase">Data: {{$liturgia['data']}}</h2>
              <p class="text-muted">{{$liturgia['liturgia']}}</p>
              <p class="text-muted">Cor: {{$liturgia['cor']}}</p>
              <ul class="list-check ps-0">
                <li>
                  <p class="mb-0 mb-2">{{$liturgia['oferendas']}}</p>
                </li>
                <li>
                  <p class="mb-0 mb-2">{{$liturgia['comunhao']}}</p>
                </li>
                <li>
                    <p class="mb-0 mb-2">{{$liturgia['dia']}}</p>
                  </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Sermons Section -->
   
    <!-- Become a Volunteer Section -->
    <section class="bg-cover bg-fixed shadow-inner" id="volunteer" style="background: url(img/divider-img.jpg)">
      <div class="primary-overlay py-5">
        <div class="overlay-content z-index-20 position-relative py-5">
          <div class="container py-5 text-white text-center">
            <h2 class="text-xl text-shadow mb-4">Primeira Leitura</h2>
            <h3 class="text-md text-shadow mb-4">{{$liturgia['primeiraLeitura']['titulo']}}</h3>
            <p class="lead text-calibri mb-1">{{$liturgia['primeiraLeitura']['texto']}}</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Next Event Section-->
    <section class="bg-primary-shade text-white py-5" id="events">
      <div class="container text-center">
        <div class="overlay-content z-index-20 position-relative py-5">
            <div class="container py-5 text-white text-center">
              <h2 class="text-xl text-shadow mb-4">Segunda Leitura</h2>
              <p class="lead text-calibri mb-1">{{$liturgia['segundaLeitura']}}</p>
            </div>
          </div>
      </div>
    </section>
    <section class="bg-cover bg-fixed shadow-inner" id="volunteer" style="background: url(img/divider-img.jpg)">
        <div class="primary-overlay py-5">
            <div class="container text-center">
                <div class="overlay-content z-index-20 position-relative py-5">
                    <div class="container py-5 text-white text-center">
                      <h2 class="text-xl text-shadow mb-4">Salmo</h2>
                      <p class="lead text-calibri mb-1">{{$liturgia['salmo']}}</p>
                    </div>
                  </div>
              </div>
        </div>
      </section>
      <section class="bg-primary-shade text-white py-5" id="events">
        <div class="overlay-content z-index-20 position-relative py-5">
            <div class="container py-5 text-white text-center">
              <h2 class="text-xl text-shadow mb-4">Evangelho</h2>
              <h3 class="text-md text-shadow mb-4">{{$liturgia['evangelho']['titulo']}}</h3>
              <br>
              <p class="lead text-calibri mb-1">{{$liturgia['evangelho']['texto']}}</p>
            </div>
          </div>
      </section>

    <!-- Events Section-->
  
    <!-- Donation Section-->
 
    <!-- Clients Section-->
    
    <!-- Scroll Top Button--><a class="scroll-top" href="#"><i class="fas fa-long-arrow-alt-up"></i></a>
    <footer class="pt-5 text-white" style="background: #111">
      <div class="">
          <div style="">
            <img src="/assets1/img/logocc.png" style="width: 70px; padding-right:10px; display: block; margin-left:auto; margin-right:auto" class="img-responsive"><p style="text-align: center; font-size:20px">Caridade Cristã</p>
          
        </div>
        <div class="py-4 border-top border-dark text-center">
          <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="/assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets1/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets1/js/countdown.js"></script>
    <script src="/assets1/vendor/progressbar.js/progressbar.js"></script>
    <script src="/assets1/js/front.js"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      
    </script>
    <script src="otherscript.js"></script>
    
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  </body>
</html>