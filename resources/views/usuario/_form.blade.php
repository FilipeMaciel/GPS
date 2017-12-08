
<div class="row">
    <div class="input-field col s12 m6">
        <input type="text" name="nome" value="{{$usuario->nome}}">
        <label for="nome">Nome</label>
    </div>
    <div class="input-field col s12 m6">
        <input type="text" name="login" value="{{$usuario->login}}">
        <label for="login">Matricula</label>
    </div>
    <div class="input-field col s12 m6">
        <input type="email" name="email" value="{{$usuario->email}}">
        <label for="email">Email</label>
    </div>
    <div class="input-field col s12 m6">
        <input type="text" name="cargo" value="{{$usuario->cargo}}">
        <label for="cargo">Cargo</label>
    </div>
</div>