@extends('layouts.app')

@section('content')
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
  <form class="form mt-5" method="" id="form" class="form">
    <div class="row">
      <div class="col-4">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" id="name" value=""/>
      </div>
    </div>
  </form>
  <div class="row justify-content-center mt-3 user_data"></div>
</div>
@endsection

@section('script')
  {{-- Pega os itens do produto --}}
  <script src="{{ asset('js/home.js') }}"></script>
@endsection
