document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
        if(toggle && nav && bodypd && headerpd){
            toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle','nav-bar','body-pd','header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
    });


    /*** Tabela de vendas ***/
    
    $(document).ready(function(){
        carregarTabelaSale(0);
    });

    $(document).on('click', '.paginationSale a', function(e) {
        e.preventDefault();
        var pagina = $(this).attr('href').split('page=')[1];
        carregarTabelaSale(pagina);
    });

    // Filtro
    $(document).on('submit', '.form_sale', function(e) {
        e.preventDefault();

        // Limpando o input de limpar filtro
        $('#clearFilter').val('');
        carregarTabelaSale(0);
    });

    // Limpar filtro
    $(document).on('click', '.clear', function(e) {
        e.preventDefault();

        var clearFilterNoActiver = "clear";
        $('#clearFilter').val(clearFilterNoActiver);
        carregarTabelaSale(0);
        
    });

    
    function carregarTabelaSale(pagina) {
        var dados = $('#form_sale').serialize();

        console.log(dados);

        $.ajax({
        url: "/getTableDataSale" + "?page=" + pagina,
        method: 'GET',
        data: dados
        }).done(function(data){
        // console.log(data);
        $('.sale_data').html(data);
        });
    }
  
    
    /*** Tabela de produtos ***/
    
    $(document).ready(function(){
        carregarTabelaProduct(0);
    });

    $(document).on('click', '.paginationProduct a', function(e) {
        e.preventDefault();
        var pagina = $(this).attr('href').split('page=')[1];
        carregarTabelaProduct(pagina);
    });

    // Filtro
    $(document).on('keyup submit', '.form', function(e) {
        e.preventDefault();
        carregarTabelaProduct(0);
    });

    function carregarTabelaProduct(pagina) {
        var dados = $('#form').serialize();

        $.ajax({
        url: "/getTableDataProduct" + "?page=" + pagina,
        method: 'GET',
        data: dados
        }).done(function(data){
        //console.log(data);
        $('.product_data').html(data);
        });
    }
  