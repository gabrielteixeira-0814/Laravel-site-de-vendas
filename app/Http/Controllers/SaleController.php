<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $listIUserModel = app(User::class);
        $listProductModel = app(Product::class);

         // List Users/Client
        $listUser = $listIUserModel->all();
        $listProduct = $listProductModel->all();

        return view('crud_sales', compact('listProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagens = [
            'quantity.required' => 'A quantidade é obrigatório!',
            'quantity.numeric' => 'É necessário que seja um número!',
            
            'discount.required' => 'O desconto é obrigatório!',
            'discount.regex' => 'O formato do desconto é inválido.',

            'status_sales.required' => 'O status é obrigatório!',
        ];

        $validatedData = $request->validate([
            'quantity' => 'required|numeric',
            'discount' => 'required|regex:/^\d+(\,\d{1,2})?$/',
            'status_sales' => 'required|string|max:255', 
        ], $mensagens);
        
        $vl_discount = $request->discount;
        $vl_discount = str_replace(',', '.', $vl_discount);

        $validatedData['discount'] = $vl_discount;
        $validatedData['status'] = 1;

        $createUser = Sale::create($validatedData);

        return back()->with('success', 'Produto vendido com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
