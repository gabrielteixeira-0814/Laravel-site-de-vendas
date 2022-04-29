@foreach ($listProduct as $product)
    <div class="col-12 col-md-2 my-3">
        <div class="border rounded border">
            <div class="text-end px-1 py-2" style="300px;">
            </div>
            <div class="px-4 pb-4" style="300px">
            <img src="img/2.png" class="img-fluid" />
            </div>
            <div class="text-center text-dark p-1 border border-2 fw-bold" style="background-color: #DCDCDC">R$ {{ $product->price }}
            </div>
            <div class="py-3" style="background-color: #f5f4f4;  height: 200px;">
            <h5 class="text-center">
                {{ $product->name }}
            </h5>
            <p class="text-center mb-0">
                {{ $product->description }}
            </p>
            </div>
            <div class="text-center border-top border-bottom p-3" id="payment" style="background-color: #DCDCDC">
            {{-- <button type="button" class="btn btn-danger paymentPage" value="{{ $product->id }}">
                Adicionar ao carrinho
            </button> --}}
            <a href='{{route('paymentPage',$product->id)}}' class='btn btn-danger paymentPage'>Adicionar ao carrinho</a>
            </div>
        </div>
    </div>
@endforeach
<div class="paginacao">
    {{ $listProduct->links() }}
</div>

   
