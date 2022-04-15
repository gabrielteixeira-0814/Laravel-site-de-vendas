@extends('layouts.app')
{{ $count = 12 }}
@section('content')
<nav class="navbar navbar-expand-md navbar-dark bg-danger fixed-top mb-5">
  <div class="container">
    <a class="navbar-brand" href="#">Loja Online</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Principal</a>
          </li>
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
<div class="container mt-5 px-0">
  <div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active text-center" data-interval="1000">
          <img src="{{ asset('img/slide1.jpg') }}" height="400" class="w-100 d-block" alt="...">
        </div>
        <div class="carousel-item" data-interval="1000">
          <img src="{{ asset('img/slide2.jpg') }}" height="400" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-interval="1000">
          <img src="{{ asset('img/slide3.jpg') }}" height="400" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>
<div class="container my-5 px-0 border-top">
  <div class="row justify-content-center mt-3">
    @for ($i = 0; $i < $count; $i++)
      <div class="col-12 col-md-2 my-3">
        <div class="border rounded border">
          <div class="text-end px-1 py-2" style="300px">
            <i class="fa-regular fa-heart" style="font-size: 20px"></i>
            {{-- <i class="fa-solid fa-heart" style="color:red"></i> --}}
          </div>
          <div class="px-4 pb-4" style="300px">
            <img src="{{ asset('img/2.png') }}" class="img-fluid"  />
          </div>
          <div class="text-center text-dark p-1 border border-2 fw-bold" style="background-color: #DCDCDC">
            R$ 10,50
          </div>
          <div class="py-3" style="background-color: #f5f4f4">
            <h5 class="text-center">Livro Robô</h5>
            <p class="text-center mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
          </div>
          <div class="text-center border-top border-bottom p-3" style="background-color: #DCDCDC">
            <button type="button" class="btn btn-danger">Adicionar ao carrinho</button>
          </div>
        </div>
      </div>
    @endfor
  </div>
</div>

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

@endsection
