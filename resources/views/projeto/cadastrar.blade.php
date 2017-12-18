@extends('layout')

@section('content')
    <form class="row s12 m4 center" style="padding:10px;" action="" method="">
      @include('projeto._form')
        <button type="submit" class="btn"><i class="material-icons right">save</i>Salvar</button>
    </form>
@endsection