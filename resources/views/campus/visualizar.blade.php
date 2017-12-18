@extends('layout')

@section('content')
    <h3 class="center-align">Curso</h3>

    <div class="row">
        <div class="input-field col s12 m6">
            <input type="text" readonly value="{{ $campus->nome }}">
            <label>Campus</label>
        </div>
    </div>
    <div class="right-align">
        Cadastrado em {{ $campus->created_at->format('d/m/Y') }}
        <br>
        Última atualização em {{ $campus->updated_at->format('d/m/Y') }}
    </div>
@endsection