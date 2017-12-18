@extends('layout')

@section('content')
    <h3 class="center-align">Alterar Coordenação</h3>
    <form action="{{ route('coordenacao.edit', ['id' => $coordenacao->id]) }}" method="post">
        {{ csrf_field() }}
        @include('coordenacao._form')

        <div class="center">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>
    </form>
@endsection