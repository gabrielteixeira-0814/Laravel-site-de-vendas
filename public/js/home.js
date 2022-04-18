
/*** Gráfico de pizza das vendas por porcentagem de vendidos e cancelados ***/
$(document).ready(function(){

     $(".favorite").click(function(){

        var favorite = $("#favorite").val();

        var valorDaDiv = $(".favorite").text();    
        $("#favorite").val(valorDaDiv);

        alert(valorDaDiv);

        // $(".favorite").before('<i class="fa-solid fa-heart favoriteActive" style="color:red"></i>');
        //$( ".favorite" ).remove();


    //     var cpf = $(".cpf").val();
    //     // alert(cpf);
    //     $.ajax({
    //     type: "GET",
    //     url: "{{ route('sale.getDataUser') }}",
    //     'data': {cpf: cpf},
    //     datatype: "json",
    //     success: function(data) {

    //     if(data) {
    //         $(".id").val(data.id);
    //         $(".name").val(data.name);
    //         $(".email").val(data.email);
    //         console.log(data.name);
    //         $(".resp").hide();
    //     }
    // },
    //     error: function (data) {
    //         $(".resp").show();
    //         $(".resp").html("Não há nenhum registro com esse CPF, verifique se está correto!");
    //         $(".resp").css({"background-color": "#f8d7da","color": "#721c24", "text-align" : "center", "font-size": "17px", "border-radius": "5px", "border-color" : "#f5c6c"});
    //         // console.log("error na parada");

    //         }
    //     });
    });

});