@extends('layout')

@section('content')
    <h3 class="center-align">Alterar Curso</h3>
    <form action="{{ route('curso.edit', ['id' => $curso->id]) }}" method="post">
        {{ csrf_field() }}
        @include('curso._form')

        <div class="center">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>
    </form>
@endsection