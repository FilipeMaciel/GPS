@extends('layout')

@section('content')

    <div class="center">
        <h3 class="center">Cadastrar Projeto</h3>
    </div>

    <form  action="{{ route('projeto.store') }}" method="POST">

        @include('projeto._form')

        <div class="center-align" style="margin-bottom: 15px">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>

    </form>
@endsection