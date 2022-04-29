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
<div class="paginationProduct">
    {{ $listProduct->links() }}
</div>
