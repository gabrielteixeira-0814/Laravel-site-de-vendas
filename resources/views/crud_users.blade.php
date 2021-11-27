@extends('layout')

@section('content')
    <h1>Adicionar / Editar Usuários</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" action="{{ route('user.store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control =" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
