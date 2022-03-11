@extends('layout')

@section('content')
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href="{{ route('sale.create') }}" class='btn btn-secondary float-right btn-sm rounded'><i class='fa fa-plus'></i></a></h5>
            <form>
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control cpf" id="inlineFormInputName">
                                <option>Clientes</option>
                                @foreach ($listUser as $listUserCpf)
                                    <option value="{{ $listUserCpf->cpf }}">{{ $listUserCpf->cpf }} - {{ $listUserCpf->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            <input type="text" class="form-control date_range" id="inlineFormInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="button" class="btn btn-primary search" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>
            <table class='table'>
                <tr>
                    <th scope="col">
                        id
                    </th>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Hora
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>

                @foreach ($listSale as $sale)
               
                    <tr>
                        <td>
                            {{ $sale->id }}
                        </td>
                        <td>
                            {{ $sale->product->name }}
                        </td>
                        <td>
                            {{ date("d/m/Y", strtotime($sale->dateSale)) }} 
                        </td>
                        <td>
                            {{ date("H:i:s", strtotime($sale->dateSale)) }} 
                        </td>
                        <td>
                            R$ {{ str_replace('.', ',', $sale->valueSale) }}
                        </td>
                        <td>
                            <a href='{{route('sale.edit',$sale->id)}}' class='btn btn-primary'>Editar</a>
                            <a href="{{route('sale.deleteEditsale',$sale->id)}}" class='btn btn-danger'>Deletar</a>
                        </td>
                    </tr>
                @endforeach
                </tr>
                
            </table>
            {{ $listSale->links() }}
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Valor Total
                    </th>
                </tr>
                <tr>
                    <td>
                        Vendidos
                    </td>
                    <td>
                        {{ $getQtdOkayCount }}
                    </td>
                    <td>
                        R$ {{ str_replace('.', ',', $getTotalOkaySale) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Cancelados
                    </td>
                    <td>
                        {{ $getQtdCalledCount }}
                    </td>
                    <td>
                        R$ {{ str_replace('.', ',', $getTotalCalledSale) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Devoluções
                    </td>
                    <td>
                        {{ $getQtdReturnedCount }} 
                    </td>
                    <td>
                        R$ {{ str_replace('.', ',', $getTotalReturnedSale) }}
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href="{{ route('product.create') }}" class='btn btn-secondary float-right btn-sm rounded'><i class='fa fa-plus'></i></a></h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>

                @foreach ($listProduct as $product)
                    <tr>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            R$ {{ str_replace('.', ',', $product->price) }}
                        </td>
                        <td>
                            <a href="{{route('product.edit',$product->id)}}" class='btn btn-primary'>Editar</a>
                            <a href="{{route('product.show',$product->id)}}" class='btn btn-danger'>Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $listProduct->links() }}

        </div>
    </div>
@endsection


@section('script')
  
<script>

    // $(document).ready(function(){
    //     alert("Ola");
    // });

    $(".search").click(function(){

        var cpf = $(".cpf").val();
        var date = $(".date_range").val();
        var dateArray = date.split(" - ");
        var dateIni = dateArray[0];
        var dateFin = dateArray[1];
        console.log(dateIni);
        console.log(dateFin);

        $.ajax({
        type: "GET",
        url: "{{ route('dashboard.getSeachSale') }}",
        'data': {cpf: cpf, dateIni: dateIni, dateFin: dateFin},
        datatype: "json",
        success: function(data) {

        if(data) {

            console.log(data);
            // $(".id").val(data.id);
            // $(".name").val(data.name);
            // $(".email").val(data.email);
            // console.log(data.name);
            // $(".resp").hide();
        }
    },
        error: function (data) {
            console.log(data);
            // $(".resp").show();
            // $(".resp").html("Não há nenhum registro com esse CPF, verifique se está correto!");
            // $(".resp").css({"background-color": "#f8d7da","color": "#721c24", "text-align" : "center", "font-size": "17px", "border-radius": "5px", "border-color" : "#f5c6c"});
            // // console.log("error na parada");

            }
        });
    });

</script>

@endsection
