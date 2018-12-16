@extends('layouts.website')

@section('content')

    {{--section 1--}}
    @component('website.home._section1', ['noticias' => $noticias, 'destaque' => $destaque, 'sliders' => $sliders])@endcomponent

    {{--section 2--}}
    @component('website.home._section2', ['owlItems' => $owlItems])@endcomponent

    {{--section 3--}}
    @component('website.home._section3', ['noticias' => $noticias])@endcomponent

@endsection
