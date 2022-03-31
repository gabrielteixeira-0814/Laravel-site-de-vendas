@extends('layouts.layout')

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
                   <h3 class="d-inline">Resultado de vendas anual {{ date('Y') }}</h3>
                   <select style="width: 100px" id="anoKpis" class="d-inline form-control float-right anoKpis">
                        <option value="2019" {{ date('Y') == "2019" ? 'selected' : "" }}>2019</option>
                        <option value="2020" {{ date('Y') == "2020" ? 'selected' : "" }}>2020</option>
                        <option value="2021" {{ date('Y') == "2021" ? 'selected' : "" }}>2021</option>
                        <option value="2022" {{ date('Y') == "2022" ? 'selected' : "" }}>2022</option>
                        <option value="2023" {{ date('Y') == "2023" ? 'selected' : "" }}>2023</option>
                        <option value="2024" {{ date('Y') == "2024" ? 'selected' : "" }}>2024</option>
                        <option value="2025" {{ date('Y') == "2025" ? 'selected' : "" }}>2025</option>
                    </select>
                </div>
                <canvas id="ChartBarSaleMensais" width="200" height="100"></canvas>
                <div id="chartDiv"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')

{{-- Pegando os graficos --}}
<script src="{{ asset('js/kpis.js') }}"></script>

@endsection
