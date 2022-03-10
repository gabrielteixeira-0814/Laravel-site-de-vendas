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

// Criação de uma nova função no controlador resources de vendas(Sales) usando essa rota com ajax Jquery
Route::get('getDataUser', 'SaleController@getDataUser')->name('sale.getDataUser');