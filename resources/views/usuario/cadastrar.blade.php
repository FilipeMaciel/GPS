@extends('layout')

@section('content')
    <h1>usuario cadastrar</h1>
    <form action="{{ route('usuario.create') }}" method="post">
        {{ csrf_token() }}
        @include('usuario._form')
        <input type="submit" value="subimita">
    </form>
@endsection