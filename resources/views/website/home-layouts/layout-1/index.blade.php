@extends('layouts.website')

@section('content')

    @component('website.home-layouts.layout-1.components.intro')@endcomponent
    @component('website.home-layouts.layout-1.components.noticias')@endcomponent
{{--    @component('website.components.layout-1._slider', ['sliders' => $sliders])@endcomponent--}}
@endsection
