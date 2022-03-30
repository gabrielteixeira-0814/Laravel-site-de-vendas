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
        
        return view('kpis');
       
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

    public function getDataKpis()
    {
        // Lista de Produtos
        $listProductModel = app(Product::class);
        $listProduct = $listProductModel->all();

        // Lista de Vendas
        $listSaleModel = app(Sale::class);
        $listSale = $listSaleModel->get();

        // Criaando array de produtos para o gráfico
        $kpiProductName = [];
        $kpiProductSaleQuant = [];
        $getKpiProductSaleQuantCount = 0;

        foreach ($listProduct as $product) {

            $getKpiProductSaleQuantCount = 0;

            // Apenas pegar produtos que estão ativos
            if($product->status == 1){

                $kpiProductName[] = $product->name;

                // Buscando uma lista com as vendas feitas com o produto
                $getKpiProductSaleQuant = $listSaleModel->where('idProduct', $product->id)->where('status',1)->get();

                // Pegando a quantidade de vendas que aquele produto foi vendido

                foreach ($getKpiProductSaleQuant as $item) {
                  
                    // Contador da quantidade de produtos (Total)
                    $getKpiProductSaleQuantCount = $getKpiProductSaleQuantCount + $item->quantity;
                }

                // Inserindo dentro de uma lista os totais de vendas de cada produto
                $kpiProductSaleQuant[] = $getKpiProductSaleQuantCount;
            }
        }
        
        $kpiSale = array(
            "productNameKpi" => $kpiProductName,
            "quantityProductKpi" => $kpiProductSaleQuant
            );

        return response()->json($kpiSale);
    }

    public function getDataKpisResultSales()
    {
        $anoKpis = $_GET['anoKpis'];

        // Lista de Vendas
        $listSaleModel = app(Sale::class);

        $listmonth = [];
        $listmonthNumber = [];

        $getListOkaySale = [];
        $getListCalledSale = [];
        $getListReturnedSale = [];

        $month = array("Janeiro" => "01", "Fevereiro" => "02", "Março" => "03", "Abril" => "04", "Maior" => "05", "Junho" => "06", "Julho" => "07", "Agosto" => "08", "Setembro" => "09", "Outubro" => "10", "Novembro" => "11","Dezembro" => "12");

        // Usando array para buscar os dados dos resultados de vendas
        foreach ($month as $key => $value) {

            // Passando os monthes description
            $listmonth[] =  $key;

            $dateIni = "$anoKpis-$value-01";
            $dateFin = "$anoKpis-$value-28";

            // resultado de vendas

            /*** Vendidos ***/ 

            $getOkaySale = $listSaleModel->where('status_sales','Okay')->where([
                ['dateSale', '>=', $dateIni],
                ['dateSale', '<=', $dateFin],
            ])->where('status',1)->get();

            // Okay Sale
            $getQtdOkayCount = $getOkaySale->count();
            
            // Adicionar as vendas (vendidos) de cada mês
            $getListOkaySale[] = $getQtdOkayCount;

            /*** Vendidos fim ***/ 

            /*** Cancelados ***/ 

            $getCalledSale = $listSaleModel->where('status_sales','Called')->where([
                ['dateSale', '>=', $dateIni],
                ['dateSale', '<=', $dateFin],
            ])->where('status',1)->get();

            // Called Sale
            $getQtdCalledCount = $getCalledSale->count();

             // Adicionar as vendas (canceladas) de cada mês
            $getListCalledSale[] = $getQtdCalledCount;

            /*** Cancelados fim ***/ 

            /*** Devolvidos ***/

            $getReturnedSale = $listSaleModel->where('status_sales','returned')->where([
                ['dateSale', '>=', $dateIni],
                ['dateSale', '<=', $dateFin],
            ])->where('status',1)->get();
    
            // Returned Sale
            $getQtdReturnedCount = $getReturnedSale->count();
    
            // Adicionar as vendas (devolvidos) de cada mês
            $getListReturnedSale[] = $getQtdReturnedCount;

            /*** Devolvidos fim ***/
        }
        
        $monthSales = array(
            "monthSalesDescription" => $listmonth,
            "monthSalesNumber" => $listmonthNumber,  
            "getListOkaySaleValue" => $getListOkaySale,
            "getListCalledSaleValue" => $getListCalledSale,
            "getListReturnedSaleValue" => $getListReturnedSale,
            );

        return response()->json($monthSales);
    }
}
