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
{{--     <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>--}}
    <script src="{{ asset('js/FormValidation.js') }}"></script>
    <script src="{{ asset('js/plugins/Bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pesquisacep.js') }}"></script>

    <script>
        function noenter() {
            return !(window.event && window.event.keyCode == 13);
        }

        function FormatMoney(amount, currency_symbol_before,
            currency_symbol_after, thousands_separator, decimal_point,
            significant_after_decimal_pt, display_after_decimal_pt)
        {
            // 30JUL2008 MSPW  Fixed minus display by moving this line to the top
            // We need to know how the significant digits will alter our displayed number
            var significant_multiplier = Math.pow(10, significant_after_decimal_pt);

            // Only display a minus if the final displayed value is going to be <= -0.01 (or equivalent)
            var str_minus = (amount * significant_multiplier <= -0.5 ? "-" : "");

            // Sanity check on the incoming amount value
            amount = parseFloat(amount);

            if( isNaN(amount) || Math.LOG10E * Math.log(Math.abs(amount)) +
                    Math.max(display_after_decimal_pt, significant_after_decimal_pt) >= 21 )
            {
                return str_minus + currency_symbol_before +
                    (isNaN(amount)? "#" : "####################".substring(0, Math.LOG10E * Math.log(Math.abs(amount)))) +
                    (display_after_decimal_pt >= 1?
                        (decimal_point + "##################".substring(0, display_after_decimal_pt)) : "") +
                    currency_symbol_after;
            }

            // Make +ve and ensure we round up/down properly later by adding half a penny now.
            amount = Math.abs(amount) + (0.5 / significant_multiplier);

            amount *= significant_multiplier;

            var str_display = parseInt(
                parseInt(amount) * Math.pow(10, display_after_decimal_pt - significant_after_decimal_pt) ).toString();

            if( str_display.length <= display_after_decimal_pt )
                str_display = (Math.pow(10, display_after_decimal_pt - str_display.length + 1).toString() +
                    str_display).substring(1);

            var comma_sep_pounds = str_display.substring(0, str_display.length - display_after_decimal_pt);
            var str_pence = str_display.substring(str_display.length - display_after_decimal_pt);

            if( thousands_separator.length > 0 && comma_sep_pounds.length > 3 )
            {
                comma_sep_pounds += ",";

                if( comma_sep_pounds.length > 7 )
                    comma_sep_pounds = comma_sep_pounds.replace(/(?=[0-9]([0-9]{3})+,)(.)(...)/g, "$2,$3");

                comma_sep_pounds = comma_sep_pounds.replace(/(?=[0-9]([0-9]{3})+,)(.)(...)/g, "$2,$3");

                // Remove the fake separator at the end, then replace all commas with the actual separator
                comma_sep_pounds = comma_sep_pounds.substring(0, comma_sep_pounds.length - 1).replace(/,/g, thousands_separator);
            }

            return str_minus + currency_symbol_before +
                comma_sep_pounds + (display_after_decimal_pt >= 1? (decimal_point + str_pence) : "") +
                currency_symbol_after;
        }

        function testaCPF(strCPF) {
            var Soma;
            var Resto;
            Soma = 0;
            strCPF = strCPF.replace(/[^a-z0-9]/gi, '');
            if (strCPF == "00000000000") return false;

            for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11)) Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10))) return false;

            Soma = 0;
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11)) Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11))) return false;
            return true;
        }

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
    @stack('index-processos-script')
    @stack('salario_calcular')
    @stack('noticias')
    @stack('form-processos-script')
    @stack('form-calculos-reajuste-script')
    @stack('form-corona-script')
    @stack('form-previdencia-script')
    @stack('form-whatsapp-script')
    @stack('pagamento-script')
    @stack('calculos-mp936-script')
</body>
</html>
