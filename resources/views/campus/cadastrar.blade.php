@extends('layout')

@section('content')
    <h1>Cadastrar Campus</h1>
    <form action="{{ route('campus.create') }}" method="post">
        {{ csrf_field() }}

        @include('campus._form')

        <div class="center">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>
    </form>
@endsection