@extends('layout')

@section('content')
    <h1>Kpi de vendas</h1>
    <div class='col-12'>
        <div class='row'>
            <div class='col-md-6 p-2 mb-5'>
                <div class='col-md-12 p-2 border rounded'>
                    <canvas id="ChartBarPieSaleOkeyCalled"></canvas>
                </div>
            </div>
            <div class='col-md-6 p-2'>
                <div class='col-md-12 p-2 border rounded'>
                    <canvas id="ChartBarPieSaleOkeyReturned"></canvas>
                </div>
            </div>
            <div class='col-md-12 p-2 border rounded'>
                <canvas id="ChartBarProduct" width="200" height="100"></canvas>
            </div>
            <div class='col-md-12 p-2 mt-5 border rounded'>
               <div>
                   <h3 class="d-inline">Resultado de vendas anual 2022</h3>
                   
                   <select style="width: 100px" class="d-inline form-control float-right">
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </div>
                <canvas id="ChartBarSaleMensais" width="200" height="100"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('script')

{{-- Pegando os graficos --}}
<script src="{{ asset('js/kpis.js') }}"></script>

@endsection
