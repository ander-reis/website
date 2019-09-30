@extends('layouts.website')

@section('content')

@if( $intro->count() > 0 )
    @component('website.components.layout-1._intro',['intro' => $intro])@endcomponent
@endif

@component('website.components.layout-1._destaque',['sliders' => $sliders, 'noticias' => $noticias])@endcomponent

<section class="mt-3">
    @component('website.components.layout-1._faixa')@endcomponent
</section>

<section class="mt-3">
    @component('website.components.layout-1._noticias2',['noticias' => $noticias])@endcomponent
</section>

<section class="mt-3">
    @component('website.components.layout-1._servicos')@endcomponent
</section>

<section class="mt-3">
    @component('website.components.layout-1._revista',['noticias' => $noticias])@endcomponent
</section>

<hr style="border-top: 1px solid rgb(0, 0, 0);">

<section class="mt-3">
    @component('website.components.layout-1._mapasite')@endcomponent
</section>
@endsection
