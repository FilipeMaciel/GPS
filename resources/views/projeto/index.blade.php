@extends('layout')

@section('content')
    <h3 class="center-align">Projetos cadastrados</h3>

    <div class="right-align">
        <a href="{{ route('projeto.create') }}" class="btn">novo projeto</a>
    </div>

    @if($projetos->count() == 0)
        <h4 class="center-align">Não há projetos cadastrados</h4>
    @else
        <table class="striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Disciplina</th>
                <th>Destino</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($projetos as $p)
                <tr>
                    <td>{{ $p->turma }}</td>
                    <td>{{ $p->disciplina->nome }}</td>
                    <td>{{ $p->destino }}</td>
                    <td><a href="{{ route('projeto.edit',['id' => $p->id]) }}"><i class="material-icons">edit</i></a></td>
                    <td><a href="{{ route('projeto.show',['id' => $p->id]) }}"><i class="material-icons">search</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $projetos->links('paginacao',['elements' => $projetos]) }}
    @endif
@endsection