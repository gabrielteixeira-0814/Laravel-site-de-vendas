@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Politica de privacidade</a>
          </li>
        </ul>
      </div>

      <div class="align-self-end">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Quero me cadastrar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Entrar</a>
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

<header>

</header>

<main>

</main>

<footer>

</footer>
@endsection
