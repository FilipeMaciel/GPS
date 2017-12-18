@extends('layout')

@section('content')
    <h3 class="center-align">Coordenações cadastradas</h3>

    <div class="right-align">
        <a href="{{ route('coordenacao.create') }}" class="btn">nova coordenação</a>
    </div>

    @if($coordenacao->count() == 0)
        <h4 class="center-align">Não há coordenações cadastradas</h4>
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
            @foreach($coordenacao as $c)
                <tr>
                    <td>{{ $c->nome }}</td>
                    <td><a href="{{ route('coordenacao.edit',['id' => $c->id]) }}"><i class="material-icons">edit</i></a></td>
                    <td><a href="{{ route('coordenacao.show',['id' => $c->id]) }}"><i class="material-icons">search</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $coordenacao->links('paginacao',['elements' => $coordenacao]) }}
    @endif
@endsection