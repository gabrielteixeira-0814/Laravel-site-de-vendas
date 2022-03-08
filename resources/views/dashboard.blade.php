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
                            <select class="form-control" id="inlineFormInputName">
                                <option>Clientes</option>
                                @foreach ($listUser as $listUserCpf)
                                    <option>{{ $listUserCpf->cpf }} - {{ $listUserCpf->name }}</option>
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
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
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
                            {{ $sale->product->id }}
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
                        100
                    </td>
                    <td>
                        R$ 100,00
                    </td>
                </tr>
                <tr>
                    <td>
                        Cancelados
                    </td>
                    <td>
                        120
                    </td>
                    <td>
                        R$ 100,00
                    </td>
                </tr>
                <tr>
                    <td>
                        Devoluções
                    </td>
                    <td>
                        120
                    </td>
                    <td>
                        R$ 100,00
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
