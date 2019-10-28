<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <script>
        $(document).ready(function () {
            $('#num_cpf').mask('000.000.000-00', {reverse: true});
            $('#icon-popover1').popover();
            $('#icon-popover2').popover();
            $('#icon-popover3').popover();
            $('#icon-popover4').popover();
            $('#icon-popover5').popover();
            $('#icon-popover6').popover();
            $('#icon-popover7').popover();
            $('#icon-popover8').popover();
            $('#icon-popover9').popover();

            // preload cursos
            $(window).on('load', function () {
                $('#preloader .inner').fadeOut();
                $('#preloader').delay(350).fadeOut('slow');
                $('body').delay(350).css({'overflow': 'visible'});
            });
        })
    </script>

    <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    @stack('boletim-script')
    @stack('cursos-script')
</body>

</html>
