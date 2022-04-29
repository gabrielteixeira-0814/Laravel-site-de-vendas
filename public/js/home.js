
/*** Adiciona os itens do produto na pagina inicial com ajax e jquer ***/
$(document).ready(function(){
    carregarTabela(0);
  });

  $(document).on('click', '.paginacao a', function(e) {
    e.preventDefault();
    var pagina = $(this).attr('href').split('page=')[1];
    carregarTabela(pagina);
  });

  // Filtro
  $(document).on('keyup submit', '.form', function(e) {
    e.preventDefault();
    carregarTabela(0);
  });

  function carregarTabela(pagina) {
    var dados = $('#form').serialize();

    $.ajax({
      url: "/getDataProduct" + "?page=" + pagina,
      method: 'GET',
      data: dados
    }).done(function(data){
      console.log(data);
      $('.user_data').html(data);
    });
  }
  
/****************************************************************************/

/*** Como inserir com appeend ***/
$(document).ready(function(){

    $.ajax({
        type: "GET",
        url: "/getDataProduct",
        'data': {},
        datatype: "json",
        success: function(data) {

            console.log(data);

        if(data) {
            $.each(data, function( index, value ) {
               //  console.log( index + ": " + data[index] );
                console.log(data[index].name);
                $( ".listProduct" ).append('<div class="col-12 col-md-2 my-3"><div class="border rounded border"><div class="text-end px-1 py-2" style="300px;"><i class="fa-regular fa-heart" id="favorite" style="font-size: 20px; cursor: pointer;"></i><input hidden class="favorite" value="1"/><i class="fa-solid fa-heart" id="favoriteActive" style="color:red; font-size: 20px; cursor: pointer;"></i><input hidden class="favoriteActive" value="0"/></div><div class="px-4 pb-4" style="300px"><img src="img/2.png" class="img-fluid" /></div><div class="text-center text-dark p-1 border border-2 fw-bold" style="background-color: #DCDCDC">R$ '+data[index].price.replace(".", ",")+'</div><div class="py-3" style="background-color: #f5f4f4;  height: 200px;"><h5 class="text-center">'+data[index].name+'</h5><p class="text-center mb-0">'+data[index].description+'</p></div><div class="text-center border-top border-bottom p-3" id="payment" style="background-color: #DCDCDC"><button type="button" class="btn btn-danger paymentPage" value="'+data[index].id+'">Adicionar ao carrinho</button></div></div></div>');
            });
        }
    },
        error: function (data) {
            console.log("error na parada");
            }
        });


        $(document).on('click', 'button.paymentPage', function(){
           var id = $(this).val(); // pega o valor do proprio elemento
           console.log(id);

           // Ir para a rota de destino
           window.location.href = "/paymentPage/"+id+"";
           
         });
});





