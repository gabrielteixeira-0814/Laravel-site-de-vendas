<?php

use Illuminate\Support\Facades\Route;

Route::resources([
    '/' => 'DashboardController',
    '/user' => 'UserController',
    '/product' => 'ProductController',
    '/sale' => 'SaleController',
]);

// Criação de uma nova função no controlador resources de vendas(Sales) usando essa rota com ajax
Route::get('getDataUser', 'SaleController@getDataUser')->name('sale.getDataUser');