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

                <div class="resp"></div>
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control cpf" id="cpf" placeholder="99999999999" name="cpf">
                </div>
                <input type="hidden" class="form-control id" id="id" name="id">
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input type="text" class="form-control name" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control email" id="email" name="email">
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
       
        $(".cpf").blur(function(){

            var cpf = $(".cpf").val();
            // alert(cpf);
            
            $.ajax({
            type: "GET",
            url: "{{ route('sale.getDataUser') }}",
            'data': {cpf: cpf},
            datatype: "json",
            success: function(data) {

            if(data) {
                $(".id").val(data.id);
                $(".name").val(data.name);
                $(".email").val(data.email);
                console.log(data.name);
            }
        },
            error: function (data) {
                $(".resp").html("Não há nenhum registro com esse CPF, verifique se está correto!");
                $(".resp").css({"background-color": "#f8d7da","color": "#721c24", "text-align" : "center", "font-size": "17px", "border-radius": "5px", "border-color" : "#f5c6c"});
                console.log("error na parada");

                }
            });
        });
    $(document).ready(function(){
        
    });
  
</script>

@endsection