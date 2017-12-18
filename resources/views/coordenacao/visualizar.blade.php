@extends('layout')

@section('content')
    <h3 class="center-align">Coordenação</h3>

    <div class="row">
        <div class="input-field col s12 m6">
            <input type="text" readonly value="{{ $coordenacao->nome }}">
            <label>Coordenação</label>
        </div>
    </div>
    <div class="right-align">
        Cadastrado em {{ $coordenacao->created_at->format('d/m/Y') }}
        <br>
        Última atualização em {{ $coordenacao->updated_at->format('d/m/Y') }}
    </div>
@endsection