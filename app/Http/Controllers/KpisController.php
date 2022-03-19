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

        $listSale = $listSaleModel::with(['product'])->get();


        // Criaando array de produtos para o gráfico
        $kpiProductName = [];
        foreach ($listProduct as $product) {

            $kpiProductName[] = $product->name;
        }

        $kpiSaleQuat = [];
        $cursoRobotica = 0;
        $cursoIngles = 0;
        $cursoLibras = 0;

        foreach ($listSale as $sale) {

            // Curso de Robôtica
            if($sale->product->name == "Curso de Robôtica"){
                $cursoRobotica = $cursoRobotica + $sale->quantity;
            }

            // Curso de Inglês
            if($sale->product->name == "Curso de Inglês"){
                $cursoIngles = $cursoIngles + $sale->quantity;
            }

            // Curso de Libras
            if($sale->product->name == "Curso de Libras"){
                $cursoLibras = $cursoLibras + $sale->quantity;
            }

        }

        $kpiSaleQuat[] = $cursoRobotica;
        $kpiSaleQuat[] = $cursoIngles;
        $kpiSaleQuat[] = $cursoLibras;

        $kpiSale = array(
            "productNameKpi" => $kpiProductName,
            "quantityProductKpi" => $kpiSaleQuat
            );


        return  $kpiSale;

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
