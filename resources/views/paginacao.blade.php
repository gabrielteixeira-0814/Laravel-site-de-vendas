@extends('layouts.app')

@section('content')
<div class="container">
  <div class='card mt-3'>
    <div class='card-body'>
        <h5 class="card-title mb-5">Tabela de vendas</h5>
        <form class="form mb-5" method="" id="nome">
          <label>Pesquise o nome aqui</label>
          <input type="text" id="nome" name="nome"/> 
          <input type="hidden" id="page" name="page" value="0"/>           
        </form>
        <div class="a">
         
        </div>
    </div>
</div>

</div>
@endsection

@section('script')
  
<script>

$(document).ready(function(){
    carregarTabela(0);
});

$(document).on('click', '.paginacao a', function(e){

    e.preventDefault();
    var pagina = $(this).attr('href').split('page=')[1];
    alert(pagina);
});
  
</script>

@endsection
