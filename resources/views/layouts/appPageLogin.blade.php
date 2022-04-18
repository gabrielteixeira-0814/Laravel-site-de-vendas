<!doctype html>
<html class="h-100"lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Site de Vendas</title>
    <!-- Styles -->
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
  </head>
  <body class="h-100">
      <nav class="navbar navbar-expand-md navbar-dark bg-danger fixed-top mb-5">
        <div class="container">
          <a class="navbar-brand" href="{{ route('index')}}">Loja Online</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#">Quero me cadastrar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard.index')}}">Entrar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fa-solid fa-cart-shopping"></i>
                  </a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
        @yield('content')
      <footer class="fixed-bottom mt-5">
        <div style="background-color: #f5f4f4">
          <div class="container p-3">
            <div class="row text-center">
              <div class="col-12 col-md-4">
                &copy; {{date("Y")}} Site de Vendas
              </div>
              <div class="col-12 col-md-4">
                Política de Privacidade
              </div>
              <div class="col-12 col-md-4">
                Administrar
              </div>
            </div>
          </div>
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>