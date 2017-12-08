@if ($errors->any())
    <ul class="collection">
        @foreach ($errors->all() as $error)
            <li class="collection-item red-text">{{ $error }}</li>
        @endforeach
    </ul>
@endif


<div class="row">
    <div class="input-field col s12 m6 has-error">
        <input type="text" name="nome" value="{{$error->has('nome') ? old('nome') : $usuario->nome}}">
        <label for="nome">Nome</label>
        @if ($errors->has('nome'))
            <span class="has-error">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input type="text" name="login" value="{{$error->has('login') ? old('login') : $usuario->login}}">
        <label for="login">Matricula</label>
        @if ($errors->has('login'))
            <span class="has-error">
                <strong>{{ $errors->first('login') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input type="email" name="email" value="{{$error->has('email') ? old('email') : $usuario->email}}">
        <label for="email">Email</label>
        @if ($errors->has('email'))
            <span class="has-error">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="input-field col s12 m6">
        <input type="text" name="cargo" value="{{$error->has('cargo') ? old('cargo') : $usuario->cargo}}">
        <label for="cargo">Cargo</label>
        @if ($errors->has('cargo'))
            <span class="has-error">
                <strong>{{ $errors->first('cargo') }}</strong>
            </span>
        @endif
    </div>
</div>