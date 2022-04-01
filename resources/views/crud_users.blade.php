@extends('layouts.layout')

@section('content')
    <h1>{{ $page == 'create' ? 'Adicionar' : 'Editar'}} Usuários</h1>
    <div class='card'>
        <div class='card-body'>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif
            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ $page == 'create' ? route($route) : route('user.update', $user->id) }}">
               
                @csrf
                @if ($method == 'PUT')
                    @method('PUT')
                @else
                    @method('POST')
                @endif

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control =" name="name" id="name" value="{{ $user != '' ? $user->name :  old('name') }}">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $user != '' ? $user->cpf :  old('cpf') }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user != '' ? $user->email :  old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirma a senha</label>
                    <input type="password" class="form-control" name="password_confirmation" >
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
