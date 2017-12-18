@extends('layout')

@section('content')
    <h1>Cadastrar Coordenação</h1>
    <form action="{{ route('coordenacao.create') }}" method="post">
        {{ csrf_field() }}

        @include('coordenacao._form')

        <div class="center">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>
    </form>
@endsection