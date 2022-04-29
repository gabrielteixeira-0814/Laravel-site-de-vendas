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
<div class="paginationSale">
    {{ $listSale->links() }}
</div>
