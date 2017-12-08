@extends('layout')

@section('content')
    <h1>usuario alterar</h1>
    <form action="{{ route('usuario.edit', ['id' => $usuario->id]) }}" method="post">
        {{ csrf_token() }}
        @include('usuario._form')
        <input type="submit" value="subimita">
    </form>
@endsection