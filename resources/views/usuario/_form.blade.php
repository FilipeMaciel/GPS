<div class="row">
    <div class="input-field col s12 m6">
        <input type="text" name="nome" value="{{ old('nome',$usuario->nome) }}">
        <label for="nome">Nome</label>
        @if ($errors->has('nome'))
            <span class="red-text">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input type="text" name="login" value="{{ old('login', $usuario->login) }}">
        <label for="login">Matricula</label>
        @if ($errors->has('login'))
            <span class="red-text">
                <strong>{{ $errors->first('login') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input type="email" name="email" value="{{ old('email', $usuario->email) }}">
        <label for="email">Email</label>
        @if ($errors->has('email'))
            <span class="red-text">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input type="text" name="cargo" value="{{ old('cargo', $usuario->cargo) }}">
        <label for="cargo">Cargo</label>
        @if ($errors->has('cargo'))
            <span class="red-text">
                <strong>{{ $errors->first('cargo') }}</strong>
            </span>
        @endif
    </div>
</div>