{{ csrf_field() }}

<div class="row">
    <div class="input-field  col s12 m5">
        <label for="turma">Turma</label>
        <input name="turma"  type="text" id="turma" value="{{ old('turma',$projeto->turma) }}">
        @if ($errors->has('turma'))
            <span class="red-text">
                <strong>{{ $errors->first('turma') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field col s12 m5">
        <select name="disciplina_id" id="disciplina_id">
            <option selected disabled>Selecione</option>
            @foreach($disciplinas as $disciplina)
                <option value="{{ $disciplina->id }}" {{ old('disciplina_id',$projeto->disciplina_id) == $disciplina->id ? 'selected' : '' }}>{{ $disciplina->nome }}</option>
            @endforeach
        </select>
        <label for="num_alunos">Numero de alunos</label>
        @if ($errors->has('disciplina_id'))
            <span class="red-text">
                <strong>{{ $errors->first('disciplina_id') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field col s12 m2">
        <input  name="num_alunos" type="number" id="num_alunos" value="{{ old('num_alunos',$projeto->num_alunos) }}">
        <label for="num_alunos">Numero de alunos</label>
        @if ($errors->has('num_alunos'))
            <span class="red-text">
                <strong>{{ $errors->first('num_alunos') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row s12 ">
    <div class="input-field col s12 m5">
        <input name="destino"  type="text" id="destino" value="{{ old('destino',$projeto->destino) }}">
        <label for="destino">Destino</label>
        @if ($errors->has('destino'))
            <span class="red-text">
                <strong>{{ $errors->first('destino') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field col s12 m4">
        <input name="site"  type="url" id="site" value="{{ old('site',$projeto->site) }}">
        <label for="site">Site</label>
        @if ($errors->has('site'))
            <span class="red-text">
                <strong>{{ $errors->first('site') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field  col s12 m3">
        <input name="fone"  type="text" id="fone" value="{{ old('fone',$projeto->fone) }}">
        <label for="fone">Fone</label>
        @if ($errors->has('fone'))
            <span class="red-text">
                <strong>{{ $errors->first('fone') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <textarea name="razao_social" class="materialize-textarea" type="text" id="razao_social">{{ old('razao_social',$projeto->razao_social) }}</textarea>
        <label for="razao_social">Razão Social</label>
        @if ($errors->has('razao_social'))
            <span class="red-text">
                <strong>{{ $errors->first('razao_social') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <textarea name="objetivo" class="materialize-textarea" type="text" id="objetivo">{{ old('objetivo',$projeto->objetivo) }}</textarea>
        <label for="objetivo">Objetivos</label>
        @if ($errors->has('objetivo'))
            <span class="red-text">
                <strong>{{ $errors->first('objetivo') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <textarea name="justificativa" class="materialize-textarea" type="text" id="justificativa">{{ old('justificativa',$projeto->justificativa) }}</textarea>
        <label for="justificativa">Justificativa</label>
        @if ($errors->has('justificativa'))
            <span class="red-text">
                <strong>{{ $errors->first('justificativa') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        <textarea name="metodologia" class="materialize-textarea" type="text" id="metodologia">{{ old('metodologia',$projeto->metodologia) }}</textarea>
        <label for="metodologia">Metodologia</label>
        @if ($errors->has('metodologia'))
            <span class="red-text">
                <strong>{{ $errors->first('metodologia') }}</strong>
            </span>
        @endif
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('select').material_select()
        })
    </script>
@endpush