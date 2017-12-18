@extends('layout')

@section('content')
    <h3 class="center-align">Cursos cadastrados</h3>

    <div class="right-align">
        <a href="{{ route('curso.create') }}" class="btn">novo curso</a>
    </div>

    @if($curso->count() == 0)
        <h4 class="center-align">Não há cursos cadastrados</h4>
    @else
        <table class="striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($curso as $c)
                <tr>
                    <td>{{ $c->nome }}</td>
                    <td><a href="{{ route('curso.edit',['id' => $c->id]) }}"><i class="material-icons">edit</i></a></td>
                    <td><a href="{{ route('curso.show',['id' => $c->id]) }}"><i class="material-icons">search</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $curso->links('paginacao',['elements' => $curso]) }}
    @endif
@endsection