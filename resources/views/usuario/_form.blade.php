<label>
    Nome
    <input type="text" name="nome" value="{{$usuario->nome}}">
</label>
<br>
<label>
    Matrícula
    <input type="text" name="login" value="{{$usuario->login}}">
</label>
<br>
<label>
    E-Mail
    <input type="email" name="email" value="{{ $usuario->email }}">
</label>
<br>
<label>
    Cargo
    <input type="text" name="cargo" value="{{ $usuario->cargo }}">
</label>