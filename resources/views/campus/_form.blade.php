<div class="row">
    <div class="input-field col s12 m6">
        <input type="text" name="nome" value="{{ old('nome',$campus->nome) }}">
        <label for="nome">Nome</label>
        @if ($errors->has('nome'))
            <span class="red-text">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif
    </div>
</div>