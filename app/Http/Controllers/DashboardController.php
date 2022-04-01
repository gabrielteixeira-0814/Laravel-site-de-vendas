<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Sale;

class DashboardController extends Controller
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
    public function index(Request $request)
    {
        $cpf = '';
        $withFilter = '';
        $listIUserModel = app(User::class);
        $listProductModel = app(Product::class);
        $listSaleModel = app(Sale::class);

        // List Users/Client
        $listUser = $listIUserModel::with(['userSales'])->get();

        // List Products
        $listProduct = $listProductModel->where('status', 1)->orderBy('created_at', 'desc')->paginate(5);

        // Filtro
        if($request->get('cpf') || $request->get('dateIni' ) || $request->get('dateFin')) {

            $cpf = $request->get('cpf');
            $dateIni = $request->get('dateIni');
            $dateFin = $request->get('dateFin');
            
            // Encontrar usuario pelo cpf
            $findUser = $listIUserModel->where('cpf', $cpf)->get();

            if($cpf != '' && $dateIni != '' && $dateFin != '') {

                // List Sales
                $listSale = $listSaleModel::with(['product'])->where('idUser', $findUser[0]['id'])->where([
                    ['dateSale', '>=', $dateIni],
                    ['dateSale', '<=', $dateFin],
                ])->orderBy('created_at', 'desc')->paginate(5);

            } else {
                if($cpf != '') {
                    // List Sales
                    $listSale = $listSaleModel::with(['product'])->where('idUser', $findUser[0]['id'])->where('status', 1)->orderBy('created_at', 'desc')->paginate(5);
                }

                if($dateIni != '' && $dateFin != '') {
                
                    // List Sales
                    $listSale = $listSaleModel::with(['product'])->where([
                        ['dateSale', '>=', $dateIni],
                        ['dateSale', '<=', $dateFin],
                    ])->orderBy('created_at', 'desc')->paginate(5);
                }
            }

        }else {

            // List Sales sem filtro
            $listSale = $listSaleModel::with(['product'])->where('status', 1)->orderBy('created_at', 'desc')->paginate(5);

            // return  $listSale;
        }
       
        // resultado de vendas

        $getOkaySale = $listSaleModel->where('status_sales','Okay')->where('status',1)->get();
        $getCalledSale = $listSaleModel->where('status_sales','Called')->where('status',1)->get();
        $getReturnedSale = $listSaleModel->where('status_sales','returned')->where('status',1)->get();

        // Pegar a quantidade os resultado de vendas

        // Okay Sale
        $getQtdOkayCount = $getOkaySale->count();

        // Called Sale
        $getQtdCalledCount = $getCalledSale->count();

        // Returned Sale
        $getQtdReturnedCount = $getReturnedSale->count();

        // Pegar o total de valores dos resultado de vendas
        
        // Okay Sale
        $getTotalOkaySale = 0;
        foreach ($getOkaySale as $value) {
            // Pegando os valores e diminuindo pelo disconto e somando todos
            $getTotalOkaySale += $value->valueSale - $value->discount;
        }
        $getTotalOkaySale = number_format($getTotalOkaySale, 2);

        // Called Sale
        $getTotalCalledSale = 0;
        foreach ($getCalledSale as $value) {
            // Pegando os valores e diminuindo pelo disconto e somando todos
            $getTotalCalledSale += $value->valueSale - $value->discount;
        }
        $getTotalCalledSale = number_format($getTotalCalledSale, 2);

        // Called Sale
        $getTotalReturnedSale = 0;
        foreach ($getReturnedSale as $value) {
            // Pegando os valores e diminuindo pelo disconto e somando todos
            $getTotalReturnedSale += $value->valueSale - $value->discount;
        }
        $getTotalReturnedSale = number_format($getTotalReturnedSale, 2); 

        return view('dashboard', compact('listUser', 'listProduct', 'listSale', 'getQtdOkayCount', 'getQtdCalledCount', 'getQtdReturnedCount', 'getTotalOkaySale', 'getTotalCalledSale', 'getTotalReturnedSale', 'withFilter'));
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

    // public function getSeachSale()
    // {
    //     $cpf = $_GET['cpf'];
    //     $dateIni = $_GET['dateIni'];
    //     $dateFin = $_GET['dateFin'];

    //     $user = app(User::class);
    //     $findUser = $user->where('cpf', $cpf)->select('id','cpf','name','email')->get();
        
    //     // List Sales
    //     $listSaleModel = app(Sale::class);
    //     $listSale = $listSaleModel::with(['product'])->where('idUser', $findUser[0]['id'])->where('status', 1)->orderBy('created_at', 'desc')->get();
    
    //     return response()->json($listSale);
    // }

}

    
