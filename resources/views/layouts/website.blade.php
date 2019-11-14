<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-6715628-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-6715628-2');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SinproSP">

    <!-- OG -->
    @yield('og')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ROBOTS -->
    @yield('robots')

    <title>{{ config('app.name', 'Site SinproSP') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/formValidation.min.css">

    {{-- Bootstrap-submenu --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap-submenu.min.css') }}">
    <script src="{{ asset('js/bootstrap-submenu.min.js') }}" defer></script>
</head>

<body>
    <div id="app">

        @component('website.components.layout-1._header')@endcomponent

        <main id="container" class="container">
            @component('website.components.layout-1._navbar')@endcomponent
            @yield('content')
        </main>

        <a id="return-to-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div id="push"></div>

    </div>
    @component('website.components.layout-1._footer')@endcomponent

    {{-- toastr --}}
    @jquery
    @toastr_css
    @toastr_js
    @toastr_render

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script> --}}
    <script src="{{ asset('js/FormValidation.js') }}"></script>
    <script src="{{ asset('js/plugins/Bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pesquisacep.js') }}"></script>

    <script>
        $(document).ready(function () {

            // preload cursos
            $(window).on('load', function () {
                $('#preloader .inner').fadeOut();
                $('#preloader').delay(350).fadeOut('slow');
                $('body').delay(350).css({'overflow': 'visible'});
            });

            //fechar o popover, apos clicar em outra parte do site
            $(document).click(function(e) {
                if ($(e.target).data('toggle') !== 'popover' && $(e.target).parents('.popover.in').length === 0) {
                    $('[data-toggle="popover"]').popover('hide');
                }
            });

            //bootstrap-submenu
            $('[data-submenu]').submenupicker();
        })
    </script>

    {{-- <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script> --}}
    @stack('boletim-script')
    @stack('cursos-script')
    @stack('relacao-escolas-script')
    @stack('pesquisa-cep-script')
    @stack('create-curriculo-script')
    @stack('update-curriculo-script')
    @stack('busca-curriculo-script')
    @stack('salario_calcular')
    @stack('noticias')
</body>

</html>
