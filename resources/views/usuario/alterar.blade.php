@extends('layout')

@section('content')
    <h3 class="center-align">Alterar Usuário</h3>
    <form action="{{ route('usuario.edit', ['id' => $usuario->id]) }}" method="post">
        {{ csrf_field() }}
        @include('usuario._form')

        <div class="center">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>
    </form>
@endsection