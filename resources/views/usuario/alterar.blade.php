@extends('layout')

@section('content')
    <h1>usuario alterar</h1>
    <form action="{{ route('usuario.edit', ['id' => $usuario->id]) }}" method="post">
        {{ csrf_field() }}
        @include('usuario._form')

        <div class="center">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>
    </form>
@endsection