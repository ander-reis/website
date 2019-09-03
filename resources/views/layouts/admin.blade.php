<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">

        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item {{ active('admin.dados-pessoal.*') }}">
                        <a class="nav-link" href="{{ route('admin.dados-pessoal.index') }}">Dados Pessoal</a>
                    </li>
{{--                    <li class="nav-item {{ active('admin.escolas.*') }}">--}}
{{--                        <a class="nav-link" href="{{ route('admin.escolas.index') }}">Escolas</a>--}}
{{--                    </li>--}}
                    <li class="nav-item {{ active('admin.historico.*') }}">
                        <a class="nav-link" href="{{ route('admin.historico.index') }}">Histórico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Promoções</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Palestras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Colônia de Férias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Jurídico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">SSP Monitor</a>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->Nome }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-3">

        @component('admin.components._alert_success')
            {{Session::get('message')}}
        @endcomponent

        @yield('content')

    </div>
</div>{{--#app--}}
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">
    $("input[maxlength]").maxlength();
    // setTimeout(function() {
    //     $("#successMessage").hide('slow')
    // }, 5000);
</script>

@stack('mask-script')
</body>
</html>

