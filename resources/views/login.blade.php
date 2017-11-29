@extends('includes.login.layout')
@section('content')


    <div id="modallogin" class="modal">
        <div class="modal-content">
            <div class="center">
            <h4>Login</h4>
            </div>

            <form class="col s8" action="{{asset('/login')}}" method="post">
                <div class="column">
                    <div class="input-field col s6">
                        <input id="login" name="login" type="text" class="validate">
                        <label for="login">SIAPE</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="senha" name="senha" type="text" class="validate">
                        <label for="senha">SENHA</label>
                    </div>
                    <div class="center">
                    <a class="waves-effect waves-light btn">Entrar</a>
                    </div>
                </div>
            </form>
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