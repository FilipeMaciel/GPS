@extends('layout')

@section('content')
    <h1>disciplina cadastrar</h1>

    <div class="row">
        <div class="input-field col s12 m6">
            <select name="curso_id" id="">
                <option selected disabled>Selecione</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
            <label for="curso_id">Curso</label>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('select').material_select();
        })
    </script>
@endpush