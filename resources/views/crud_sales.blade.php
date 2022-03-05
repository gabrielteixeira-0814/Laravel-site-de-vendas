@extends('layout')

@section('content')
    <h1> {{ $page == "edit" ? "Editar Venda" : "Adicionar" }}</h1>
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
            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('sale.store')}}">
                @csrf
                @method('POST')
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" placeholder="99999999999" name="cpf">
                </div>
                <input type="hidden" class="form-control " id="id" name="id" value="1">
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input type="text" class="form-control " id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <select id="product" class="form-control" name="product">
                        <option selected>Escolha...</option>
                        @foreach ($listProduct as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input type="text" class="form-control" id="quantity" placeholder="1 a 10" name="quantity">
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input type="text" class="form-control" id="discount" placeholder="100,00 ou menor" name="discount">
                </div>
                <div class="form-group">
                    <label for="status_sales">Status</label>
                    <select id="status_sales" class="form-control" name="status_sales">
                        <option selected>Escolha...</option>
                        <option value="Okay">Aprovado</option>
                        <option value="Called">Cancelado</option>
                        <option value="returned">Devolvido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection


@section('script')
  
<script>

    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "{{ route('sale.getDataUser') }}",
            'data': {id: 1},
            datatype: "json",
            success: function(data) {
            // $("#div1").html(result);
            // alert(result);

            console.log(data);
            // console.log("Ola mundo!");
        },
        error: function (data) {
                console.log(data);
            }
        });
    });
  
</script>


@endsection