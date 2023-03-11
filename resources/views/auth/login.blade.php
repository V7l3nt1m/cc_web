<x-guest-layout>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Caridade Cristã
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  
  <link rel="shortcut icon" href="/assets1/img/logocc.png">
  <link rel="stylesheet" href="/otherstyle.css">

</head>

<body class="">
  <div id="preloader"></div>

  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                  <h4 class="font-weight-bolder" style="color: #92746B">Login</h4>
                  <p class="mb-0">Entre com o seu Nome de Usuário e a sua Palavra-Passe</p>

                  <x-validation-errors class="mb-4" />

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                  <x-input id="email" class="block mt-1 w-full form-control form-control-lg" placeholder="Nome de Usuário" type="text" name="username" aria-label="Email" :value="old('username')" required autofocus autocomplete="username" />
                    </div>
                    <div class="mb-3">
                        <x-input id="password" class="block mt-1 w-full form-control form-control-lg" placeholder="Palavra-Passe" aria-label="Password" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" style="background-color:#92746B" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Iniciar Sessão</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary bg-cover bg-center h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('assets/img/banner-2.jpg');
          background-size: cover;">
                <span class="mask  opacity-6" style="background-color: #92746B"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">Caridade Cristã</h4>
                <p class="text-white position-relative">Bem Vindo ao Sistema de Gestão CC</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="otherscript.js"></script>

</body>

</html>
</x-guest-layout>
