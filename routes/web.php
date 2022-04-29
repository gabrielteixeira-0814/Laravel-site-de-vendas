<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::resources([
    '/' => 'HomeStoreController',
    '/dashboard' => 'DashboardController',
    '/user' => 'UserController',
    '/product' => 'ProductController',
    '/sale' => 'SaleController',
    '/kpis' => 'KpisController',
]);

/*********** Paginas ***********/

Route::get('paymentPage/{id}', 'SaleController@paymentPage')->name('paymentPage');


/*********** Funções que não funciona com os "CONTROLLERS RESOURCES" ***********/

// Criaçao da função editar coluna de status da venda, produto e usuário, ao invés de excluir
Route::get('deleteEditsale/{id}', 'SaleController@deleteEditsale')->name('sale.deleteEditsale');


/*********** Animações ***********/

// Criação de novas função no controlador usando rota com ajax Jquery para trazer os dados do usuario
Route::get('getDataUser', 'SaleController@getDataUser')->name('sale.getDataUser');

/*********** Listas ***********/

// Lista de produtos dinâmicamente para pagina inicial "Home" ajax Jquery
Route::get('getDataProduct', 'HomeStoreController@getDataProduct')->name('home.getDataProduct');

// Tabela de vendas
Route::get('getTableDataSale', 'DashboardController@getTableDataSale')->name('dashboard.getTableDataSale');

// Tabela de produtos
Route::get('getTableDataProduct', 'DashboardController@getTableDataProduct')->name('dashboard.getTableDataProduct');


// Rota para trazer dados para os Kpis com ajax Jquery  
// Quando for usar dentro de um arquivo blade usar o apelido (kpis.getDataKpis)
// Quando for usar a rota dentro do arquivo js usar (getDataKpis)
Route::get('getDataKpis', 'KpisController@getDataKpis')->name('kpis.getDataKpis');


/*********** Gráfico ***********/

// Gráfico de barra resultados de vendas
Route::get('getDataKpisResultSales', 'KpisController@getDataKpisResultSales')->name('kpis.getDataKpisResultSales');


