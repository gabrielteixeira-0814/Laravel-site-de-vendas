
<table class='table'>
  <thead>
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
    </tr>
  </thead>
  <tbody>
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
        </tr>
    @endforeach
  </tbody>
</table>
<div class="paginacao">
    {{ $listSale->render() }}
</div>
   
