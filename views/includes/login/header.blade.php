<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            @include('includes.login.menu_options')
        </ul>
        <ul class="side-nav" id="mobile-demo">
            @include('includes.login.menu_options')
        </ul>
    </div>
</nav>
@push('scripts')

    <script type="text/javascript">
        $(function () {
            $(".button-collapse").sideNav();
        })

    </script>
@endpush