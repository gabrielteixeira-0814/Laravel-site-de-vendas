@extends('layout')

@section('content')
    <h1>{{ $page == 'create' ? 'Adicionar' : 'Editar'}} Produto</h1>
    <div class='card'>
        <div class='card-body'>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ $page == 'create' ? route($route) : route('product.update', $product->id) }}">

                @csrf
                @if ($method == 'PUT')
                    @method('PUT')
                @else
                    @method('POST')
                @endif
                
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control " id="name" name="name" value="{{ $product != '' ? $product->name :  old('name') }}">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control" id="description" value="{{ old('description') }}" name="description">{{ $product != '' ? $product->description : old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $product != '' ? $product->price :  old('price') }}" placeholder="0,00">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
