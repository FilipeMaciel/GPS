@extends('layout')

@section('content')
    <h3 class="center-align">Alterar Campus</h3>
    <form action="{{ route('campus.edit', ['id' => $campus->id]) }}" method="post">
        {{ csrf_field() }}
        @include('campus._form')

        <div class="center">
            <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
        </div>
    </form>
@endsection