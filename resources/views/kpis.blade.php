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
                <h3>Resultado de vendas anual 2022</h3>
                <canvas id="ChartBarSaleMensais" width="200" height="100"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('script')

{{-- Pegando os graficos --}}

<script src="{{ asset('js/kpis.js') }}"></script>

@endsection
