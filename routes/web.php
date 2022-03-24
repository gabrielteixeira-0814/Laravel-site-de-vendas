<?php

use Illuminate\Support\Facades\Route;

Route::resources([
    '/' => 'DashboardController',
    '/user' => 'UserController',
    '/product' => 'ProductController',
    '/sale' => 'SaleController',
    '/kpis' => 'KpisController',
]);

// Criaçao da função editar coluna de status da venda, produto e usuário, ao invés de excluir
Route::get('deleteEditsale/{id}', 'SaleController@deleteEditsale')->name('sale.deleteEditsale');

// Criação de novas função no controlador usando rota com ajax Jquery
Route::get('getDataUser', 'SaleController@getDataUser')->name('sale.getDataUser');
Route::get('getSeachSale', 'DashboardController@getSeachSale')->name('dashboard.getSeachSale');


// Rota para trazer dados para os Kpis com ajax Jquery
// Quando for usar dentro de um arquivo blade usar o apelido (kpis.getDataKpis)
// Quando for usar a rota detro do arquivo js usar (getDataKpis)
Route::get('getDataKpis', 'KpisController@getDataKpis')->name('kpis.getDataKpis');

// Gráfico de barra resultados de vendas
Route::get('getDataKpisResultSales', 'KpisController@getDataKpisResultSales')->name('kpis.getDataKpisResultSales');



