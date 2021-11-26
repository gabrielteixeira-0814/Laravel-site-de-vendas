<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DashboardController;


/*
Telas para ver o funcionamento sem dados
*/
// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/user', function () {
//     return view('crud_users');
// });

// Route::get('/sales', function () {
//     return view('crud_sales');
// });

// Route::get('/products', function () {
//      return view('crud_products');
//  });

Route::resources([
    '/' => 'DashboardController',
    '/user' => 'UserController',
    '/product' => 'ProductController',
    '/sale' => 'SaleController',
]);