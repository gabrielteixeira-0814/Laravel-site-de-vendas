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
        $page = 'create';
        $route = 'sale.store';
        $method = 'POST';
        $dataUser = '';
        $dataProduct = '';

        $listIUserModel = app(User::class);
        $listProductModel = app(Product::class);

         // List Users/Client
        $listUser = $listIUserModel->all();
        $listProduct = $listProductModel->all();

        return view('crud_sales', compact('listProduct', 'page', 'route', 'method','dataUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;
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
        
        // Convertendo valor dinheiro para formato correto
        $vl_discount = $request->discount;
        $vl_discount = str_replace(',', '.', $vl_discount);

        $findProduct = app(Product::class);
        $valueProduct = $findProduct->where('id', $request->product)->select('id','name','price')->get();

        $validatedData['idUser'] = $request->id;
        $validatedData['idProduct'] = $request->product;
        $validatedData['dateSale'] = $request->date;
        $validatedData['valueSale'] = $valueProduct[0]['price'];
        $validatedData['discount'] = $vl_discount;
        $validatedData['status'] = 1;

       // return $validatedData;

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
        $id = $id;
        $page = "edit";
        $route = 'sale.update';
        $method = 'PUT';


        $listIUserModel = app(User::class);
        $listProductModel = app(Product::class);
        $findSaleModel = app(Sale::class);

         // List Users/Client
        $listUser = $listIUserModel->all();
        $listProduct = $listProductModel->all();

        // Encontrar os dados da venda 
        $dataSale = $findSaleModel->find($id);
        
        // Encontrar os dados do usuário 
        $dataUser = $listIUserModel->find($dataSale->idUser);

        // Encontrar os dados do produto 
        $dataProduct = $listProductModel->find($dataSale->idProduct);

        //$sale = $findSaleModel::with(["saleUser"])->where('id', $id)->get();
        // return $findDataUser;

        return view('crud_sales', compact ('id', 'page','route', 'method','listUser', 'listProduct', 'dataSale', 'dataUser', 'dataProduct'));
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

        $validatedData = $request->validate([
            'quantity' => 'required|numeric',
            'discount' => 'required|regex:/^\d+(\,\d{1,2})?$/',
            'status_sales' => 'required|string|max:255', 
        ], $mensagens);
        
        // Convertendo valor dinheiro para formato correto
        $vl_discount = $request->discount;
        $vl_discount = str_replace(',', '.', $vl_discount);

        // Encontrar o usuário
        $findUser = app(User::class);
        $valueSale = $findUser->where('id', $request->id)->select('id','name','email')->get();
        
        // Encontrar um produto
        $findProduct = app(Product::class);
        $valueProduct = $findProduct->where('id', $request->product)->select('id','name','price')->get();

        $validatedData['quantity'] = $request->quantity;
        $validatedData['discount'] = $vl_discount;
        $validatedData['status_sales'] = $request->status_sales;
        $validatedData['idUser'] = $request->id;
        $validatedData['idProduct'] = $request->product;
        $validatedData['dateSale'] = $request->date;
        $validatedData['valueSale'] = $valueProduct[0]['price'];
        $validatedData['status'] = 1;

        // return $validatedData;
        $sale = Sale::where('id', $id)->first();

        // return $sale;
        
        if($sale) {
            return 'ola';
            $sale->update($validatedData);
            return back()->with('success', 'Venda editada com sucesso.');
        }else {
            return back()->with('error', 'Venda não foi editada!');
        }

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

    public function getDataUser()
    {
        $cpf = $_GET['cpf'];
        $user = app(User::class);
        $findUser = $user->where('cpf', $cpf)->select('id','cpf','name','email')->get();

        return response()->json($findUser[0]);
    }
}
