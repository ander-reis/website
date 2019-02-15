<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    {{--@component('website.components._header')@endcomponent--}}
    @component('website.components.layout-1._navbar')@endcomponent

{{--    @component('website.components._navbar', ['menuItems' => $menuItems])@endcomponent--}}
{{--    @component('website.components.layout-1._navbar')@endcomponent--}}

    <div class="clearfix"></div>

    <main id="container" class="container py-4">
        @yield('content')
    </main>

    <div id="push"></div>
</div>

{{--@component('website.components._footer')@endcomponent--}}
@component('website.components.layout-1._footer')@endcomponent

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
