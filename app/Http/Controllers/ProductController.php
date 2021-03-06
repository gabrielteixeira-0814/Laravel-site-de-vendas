<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    // Impede que o usuario que não esta autenticado acesse o controle
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $route = 'product.store';
        $method = 'POST';
        $product = '';
        return view('crud_products', compact('page', 'route', 'method', 'product'));
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
            'name.required' => 'O nome é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do produto!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do produto!',

            'description.required' => 'A descrição é obrigatório!',
            'description.max' => 'É necessário no Máximo 255 caracteres na descrição do produto!',

            'price.required' => 'O preço é obrigatório!',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|regex:/^\d+(\,\d{1,2})?$/', // Parei aqui 
        ], $mensagens);
        
        // return $request->price;

        $vl_unitario = $request->price;
        $vl_unitario = str_replace(',', '.', $vl_unitario);
        //$vl_unitario = "3,00";

        $validatedData['price'] = $vl_unitario;
        $validatedData['status'] = 1;

        $createUser = Product::create($validatedData);

        return back()->with('success', 'Produto criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findProductModel = app(Product::class);
        $product = $findProductModel->find($id);
        $product->delete();

       return back()->with('success', 'Produto deletado com sucesso.');
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
        $route = 'product.update';
        $method = 'PUT';

        $findProductModel = app(Product::class);
        $product = $findProductModel->find($id);

        return view('crud_products', compact('id','page', 'route', 'method', 'product'));
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
            'name.required' => 'O nome é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do produto!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do produto!',

            'description.required' => 'A descrição é obrigatório!',
            'description.max' => 'É necessário no Máximo 255 caracteres na descrição do produto!',

            'price.required' => 'O preço é obrigatório!',
            'price.regex' => 'O formato do preço é inválido!',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|regex:/^\d+(\,\d{1,2})?$/',
        ], $mensagens);
        
        // return $request->price;

        $vl_unitario = $request->price;
        $vl_unitario = str_replace(',', '.', $vl_unitario);
        //$vl_unitario = "3,00";

        $validatedData['price'] = $vl_unitario;
        $validatedData['status'] = 1;

        $product = Product::where('id', $id)->first();
        
        if($product) {
            $product->update($validatedData);
            return back()->with('success', 'Produto editado com sucesso.');
        }else {
            return back()->with('error', 'Produto não foi editado!');
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
        //return 'Ola '+$id;
    }
}
