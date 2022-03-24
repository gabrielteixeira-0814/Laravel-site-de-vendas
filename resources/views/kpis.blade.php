@extends('layout')

@section('content')
ola
    <h1>Kpi de vendas</h1>
    <div class='col-12'>
        <div class='row'>
            <div class='col-md-8 p-2 border'>
                <canvas id="ChartBarProduct" width="200" height="100"></canvas>
            </div>
            <div class='col-md-4 p-2 border'>
               ola
            </div>
            <div class='col-md-4 p-2 border'>
                ola
            </div>
        </div>
    </div>
@endsection

@section('script')

{{-- Pegando os graficos --}}
<script src="{{ asset('js/kpis.js') }}"></script>

@endsection
