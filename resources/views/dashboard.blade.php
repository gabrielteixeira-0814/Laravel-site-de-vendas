@extends('layouts.layout')

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
                    <div class="col-sm-4 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="inlineFormInputName" name="cpf">
                                <option value="">Clientes</option>
                                @foreach ($listUser as $listUserCpf)
                                    <option value="{{ $listUserCpf->cpf }}">{{ $listUserCpf->cpf }} - {{ $listUserCpf->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Início</div>
                            </div>
                            <input type="date" class="form-control" id="" name="dateIni" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-3 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Final</div>
                            </div>
                            <input type="date" class="form-control" id="" name="dateFin" placeholder="Username">
                        </div>
                    </div>
                   
                       
                        <div class="mx-2">
                            <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                                <i class='fa fa-search'></i></button>
                        </div>
                        <div class="my-1">
                            <button type="submit" class="btn btn-warning text-light" style='padding: 10px 16px;'>Limpar</button>
                        </div>
                </div>
            </form>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor do produto
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Valor do desconto
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
                            {{ $sale->product->name }}
                        </td>
                        <td>
                            {{ date("d/m/Y", strtotime($sale->dateSale)) }} 
                        </td>
                        <td>
                            R$ {{ str_replace('.', ',', $sale->product->price) }}
                        </td>
                        <td  class="pl-5">
                            {{ $sale->quantity }}
                        </td>
                        <td>
                            R$ {{ str_replace('.', ',', $sale->discount) }}
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
