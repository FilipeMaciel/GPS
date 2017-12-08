@extends('layout')

@section('content')
    <h3 class="center-align">Cadastrar Usuário</h3>
    <form action="{{ route('usuario.create') }}" method="post">
        {{ csrf_field() }}

        @include('usuario._form')

        <div class="center">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>
    </form>
@endsection