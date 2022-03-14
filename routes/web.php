<?php

use Illuminate\Support\Facades\Route;

Route::resources([
    '/' => 'DashboardController',
    '/user' => 'UserController',
    '/product' => 'ProductController',
    '/sale' => 'SaleController',
]);

// Criaçao da função editar coluna de status da venda, produto e usuário, ao invés de excluir
Route::get('deleteEditsale/{id}', 'SaleController@deleteEditsale')->name('sale.deleteEditsale');

// Criação de novas função no controlador usando rota com ajax Jquery
Route::get('getDataUser', 'SaleController@getDataUser')->name('sale.getDataUser');
Route::get('getSeachSale', 'DashboardController@getSeachSale')->name('dashboard.getSeachSale');




Route::get('teste', 'DashboardController@getTeste')->name('dashboard.getTeste');