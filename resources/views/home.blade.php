@extends('layouts.app')
{{ $count = 12 }}
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
  <div class="row justify-content-center mt-3">
    @for ($i = 0; $i < $count; $i++)
      <div class="col-12 col-md-2 my-3">
        <div class="border rounded border">
          <div class="text-end px-1 py-2" style="300px;">

            <i class="fa-regular fa-heart" id="favorite" style="font-size: 20px; cursor: pointer;"></i>
            <input hidden class="favorite" value="1"/>

            <i class="fa-solid fa-heart" id="favoriteActive" style="color:red; font-size: 20px; cursor: pointer;"></i>
            <input hidden class="favoriteActive" value="0"/>

          </div>
          <div class="px-4 pb-4" style="300px">
            <img src="{{ asset('img/2.png') }}" class="img-fluid" />
          </div>
          <div class="text-center text-dark p-1 border border-2 fw-bold" style="background-color: #DCDCDC">
            R$ 10,501
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
@endsection

@section('script')

{{-- Animações dos produtos --}}
<script src="{{ asset('js/home.js') }}"></script>

@endsection
