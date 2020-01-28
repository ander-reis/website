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
    <!-- ROBOTS -->
    @yield('robots')
    <title>{{ config('app.name', 'Site SinproSP') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <header class="header_footer mb-3 d-lg-block">
        <div class="container">
            <div class="mx-auto text-center">
                <a href="/">
                    <img
                        src="{{ asset('images/layout-1/navbar/logo_sinpro_branco.png') }}"
                        class="m-3"
                        alt="SinproSP"
                        width="240px"
                        height="73px"
                    >
                </a>
            </div>
        </div>
    </header>
    <main id="container" class="container">
        @yield('content')
    </main>
    <a id="return-to-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div id="push"></div>
</div>
@component('website.components.layout-1._footer')@endcomponent
</body>
</html>

