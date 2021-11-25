<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\User;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $listProductModel = app(Product::class);
        $listIUserModel = app(User::class);
        $listSaleModel = app(Sale::class);

        $searchCpf = request('cpf');
       
        if($searchCpf) {
            $findUser =  $listIUserModel->where('cpf', $searchCpf)->first();

            $listSale = $listSaleModel::with('product')->where([
                ['user_id', 'like', '%'.$findUser->id.'%']
            ])->orderBy('created_at', 'desc')->paginate(10);
        } else {
        
            // List Sales
            $listSale = $listSaleModel::with('product')->orderBy('created_at', 'desc')->paginate(3);
        }

        // List Product
        $listProduct = $listProductModel->orderBy('created_at', 'desc')->paginate(3);

        // List Users/Client
        $listUser = $listIUserModel->all();

        // Count de Aprovado
        $aprovado = $listSaleModel->where('status_sale', 'aprovado')->where('status_active', 1)->get();
        $aprovadoCount = $aprovado->count();

        // Count de Cancelado
        $cancelado = $listSaleModel->where('status_sale', 'cancelado')->where('status_active', 1)->get();
        $canceladoCount = $cancelado->count();

        // Count de Devolvido
        $devolvido = $listSaleModel->where('status_sale', 'devolvido')->where('status_active', 1)->get();
        $devolvidoCount = $devolvido->count();

        // Sum de Aprovado
        $aprovadoSum = $listSaleModel->where('status_sale', 'aprovado')->where('status_active', 1)->sum('value_sale');

        // Sum de Cancelado
        $canceladoSum = $listSaleModel->where('status_sale', 'cancelado')->where('status_active', 1)->sum('value_sale');

        // Sum de Devolvido
        $devolvidoSum = $listSaleModel->where('status_sale', 'devolvido')->where('status_active', 1)->sum('value_sale');
       
        // return view('dashboard', compact('listProduct', 'listUser', 'listSale', 'aprovadoCount', 'canceladoCount', 'devolvidoCount', 'aprovadoSum','canceladoSum', 'devolvidoSum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
