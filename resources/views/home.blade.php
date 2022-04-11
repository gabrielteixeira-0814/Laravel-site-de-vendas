@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-md navbar-dark bg-danger">
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
<div class="container">
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
<div class="container mt-5 border-top">ola</div>



@endsection
