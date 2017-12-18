@extends('layout')

@section('content')
    <h3 class="center-align">Campus cadastrados</h3>

    <div class="right-align">
        <a href="{{ route('campus.create') }}" class="btn">novo campus</a>
    </div>

    @if($campus->count() == 0)
        <h4 class="center-align">Não há campus cadastrados</h4>
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
            @foreach($campus as $c)
                <tr>
                    <td>{{ $c->nome }}</td>
                    <td><a href="{{ route('campus.edit',['id' => $c->id]) }}"><i class="material-icons">edit</i></a></td>
                    <td><a href="{{ route('campus.show',['id' => $c->id]) }}"><i class="material-icons">search</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $campus->links('paginacao',['elements' => $campus]) }}
    @endif
@endsection