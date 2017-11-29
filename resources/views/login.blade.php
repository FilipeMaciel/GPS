@extends('includes.login.layout')
@section('content')


    <div id="modallogin" class="modal" style="width:350px;">
        <div class="modal-content">
            <div class="center">
            <h4>Login</h4>
            </div>

            <form class="col s4">
                <div class="column">
                    <div class="input-field col s2">
                        <input id="login" name="login" type="text" class="validate">
                        <label for="login">SIAPE</label>
                    </div>

                    <div class="input-field col s2">
                        <input id="senha" name="senha" type="password" class="validate">
                        <label for="senha">SENHA</label>
                    </div>
                    <div class="center">
                    <a class="waves-effect waves-light btn">Entrar</a>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div id="modaldownload" class="modal bottom-sheet">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
@endsection

@push('scripts')
<script>

    $(document).ready(function(){
        // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
    });

</script>
@endpush