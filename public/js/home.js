
/*** Gráfico de pizza das vendas por porcentagem de vendidos e cancelados ***/
$(document).ready(function(){

    // $("#favoriteActive").hide();
    // $("#favorite").show();

    // $("#favorite").click(function(){
        
    //     var favorite = $(".favorite").val();

    //     alert(favorite);

    //     if(favorite == 1){
    //         $("#favoriteActive").show();
    //         $(".favoriteActive").show();

    //         $("#favorite").hide();
    //         $(".favorite").hide();
    //     }
    // });

    // $("#favoriteActive").click(function(){
    //     var favorite = $(".favoriteActive").val();

    //     alert(favorite);

    //     if(favorite == 0){
    //         $("#favoriteActive").hide();
    //         $(".favoriteActive").hide();

    //         $("#favorite").show();
    //         $(".favorite").show();
    //     }
    // });

    $.ajax({
        type: "GET",
        url: "/getDataProduct",
        'data': {},
        datatype: "json",
        success: function(data) {

        if(data) {
            console.log(data);
        }
    },
        error: function (data) {
            console.log("error na parada");
            }
        });

});