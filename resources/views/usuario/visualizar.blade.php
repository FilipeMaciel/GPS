@extends('layout')

@section('content')
    <h3 class="center-align">Usuário</h3>

    <div class="row">
        <div class="input-field col s12 m6">
            <input type="text" readonly value="{{ $usuario->nome }}">
            <label>Nome</label>
        </div>
        <div class="input-field col s12 m6">
            <input type="text" readonly value="{{ $usuario->login }}">
            <label>Mátricula</label>
        </div>
        <div class="input-field col s12 m6">
            <input type="text" readonly value="{{ $usuario->email }}">
            <label>Email</label>
        </div>
        <div class="input-field col s12 m6">
            <input type="text" readonly value="{{ $usuario->cargo }}">
            <label>Cargo</label>
        </div>
    </div>
    <div class="right-align">
        Cadastrado em {{ $usuario->created_at->format('d/m/Y') }}
        <br>
        Última atualização em {{ $usuario->updated_at->format('d/m/Y') }}
    </div>
@endsection