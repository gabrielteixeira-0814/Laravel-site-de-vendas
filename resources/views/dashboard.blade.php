@extends('layouts.layout')

@section('content')
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
<div class="pt-4 pb-1">
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href="{{ route('sale.create') }}" class='btn btn-secondary float-right btn-sm rounded'><i class='fa fa-plus'></i></a></h5>
            <form method="" class="form_sale" id="form_sale">
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
                        <button type="button" class="btn btn-warning text-light clear" style='padding: 10px 16px;'>Limpar</button>
                    </div>
                </div>
            </form>
            {{-- Insere a pagina listSale.blade.php --}}
            <div class="sale_data"></div>
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

    <div class='card mt-3 mb-5'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href="{{ route('product.create') }}" class='btn btn-secondary float-right btn-sm rounded'><i class='fa fa-plus'></i></a></h5>
                {{-- Insere a pagina listProduct.blade.php --}}
            <div class="product_data"></div>

        </div>
    </div>
</div>
@endsection

