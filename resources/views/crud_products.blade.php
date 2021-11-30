@extends('layout')

@section('content')
    <h1>{{ $page ? 'Adicionar' : 'Editar'}} Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control " id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="0,00">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
