@extends('layout')

@section('content')
    <h1>Cadastrar Curso</h1>
    <form action="{{ route('curso.create') }}" method="post">
        {{ csrf_field() }}

        @include('curso._form')

        <div class="center">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>
    </form>
@endsection