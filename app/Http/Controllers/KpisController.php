<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Product;
use App\Sale;

class KpisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lista de Produtos
        $listProductModel = app(Product::class);
        $listProduct = $listProductModel->all();

        // Lista de Vendas
        $listSaleModel = app(Sale::class);
        $listSale = $listSaleModel->get();

        // $listSale = $listSaleModel::with(['product'])->get();


        // Criaando array de produtos para o gráfico
        $kpiProductName = [];
        $kpiProductSaleQuant = [];
        $getKpiProductSaleQuantCount = 0;

        foreach ($listProduct as $product) {

            // Apenas pegar produtos que estão ativos
            if($product->status == 1){

            $kpiProductName[] = $product->name;

            // Buscando uma lista com as vendas feitas com o produto
            $getKpiProductSaleQuant = $listSaleModel->where('idProduct', $product->id)->where('status',1)->get();

            // Pegando a quantidade de vendas que aquele produto foi vendido

            foreach ($getKpiProductSaleQuant as $item) {
                $getKpiProductSaleQuantCount = $getKpiProductSaleQuantCount + $item->quantity;
            }


            // $getKpiProductSaleQuantCount = $getKpiProductSaleQuant->count();

            // Inserindo dentro de uma lista os totais de vendas de cada produto
            $kpiProductSaleQuant[] = $getKpiProductSaleQuantCount;

            }
        }
        
        $kpiSale = array(
            "productNameKpi" => $kpiProductName,
            "quantityProductKpi" => $kpiProductSaleQuant
            );

        return $kpiSale;

        // return $listSale;
        return view('kpis', compact('listProduct'));
       
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
