

        <a href="#" data-activates="mobile-demo" class="button-collapse hide-on-large-only"><i class="material-icons ">menu</i></a>
        <ul class="side-nav fixed green white-text">
            @include('includes.principal.menu_options')
        </ul>
        <ul class="side-nav" id="mobile-demo">
            @include('includes.principal.menu_options')
        </ul>


@push('scripts')

    <script type="text/javascript">
        $(function () {
            $(".button-collapse").sideNav();
        })

    </script>
@endpush