<div class="container">
    <div class="col-12 my-3 text-center">
        <a href="/">
            <img class="img-fluid pr-2" src="{{ asset('images/site/header/logo.png') }}" alt="SinproSP">
        </a>
    </div>
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
{{--                    @foreach($menuItems as $menuItem)--}}
{{--                        @if($menuItem['child'] == null)--}}
                            {{--<li class="nav-item mx-3 @isset($menuItem['class_active']){{ active($menuItem['class_active']) }} @endisset">--}}
                                {{--<a class="nav-link"--}}
{{--                                   href="{{ URL::route('home') }}/{{ $menuItem['link'] }}">{{ $menuItem['label'] }}--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@else--}}
                            {{--<li class="nav-item dropdown mx-3 @isset($menuItem['class_active']){{ active($menuItem['class_active']) }} @endisset">--}}
                                {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
                                   {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    {{ $menuItem['label'] }}--}}
                                {{--</a>--}}
                                {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                    {{--@foreach($menuItem['child'] as $item)--}}
                                        {{--<a class="dropdown-item"--}}
{{--                                           href="{{ URL::route('home') }}/{{ $item['link'] }}">{{ $item['label'] }}</a>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                </ul>
            </div>
        </nav>
    </div>

</div>
