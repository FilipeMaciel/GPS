@extends('layout')

@section('content')
    <h3 class="center-align">Usuários cadastrados</h3>

    @if($usuarios->count() == 0)
        <h4 class="center-align">Não há usuários cadastrados</h4>
    @else
        <table class="striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->cargo }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td><a href="{{ route('usuario.edit',['id' => $usuario->id]) }}"><i class="material-icons">edit</i></a></td>
                    <td><a href="{{ route('usuario.show',['id' => $usuario->id]) }}"><i class="material-icons">search</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $usuarios->links('paginacao',['elements' => $usuarios]) }}
    @endif

@endsection