<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Site SinproSP') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css">
    <link rel="stylesheet" href="css/formValidation.min.css">
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
            $('#icon-popover').popover();
            $('#icon-popover2').popover();
        })
    </script>
</body>

</html>
