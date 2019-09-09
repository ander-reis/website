@extends('layouts.website')

@section('content')

{{-- @component('website.home-layouts.layout-1.components.intro')@endcomponent --}}
@component('website.home-layouts.layout-2.components.destaque')@endcomponent

<section class="mt-3">
    @component('website.home-layouts.layout-2.components.faixa')@endcomponent
</section>

<section class="mt-3">
    @component('website.home-layouts.layout-2.components.noticias2')@endcomponent
</section>

<section class="mt-3">
    @component('website.home-layouts.layout-2.components.servicos')@endcomponent
</section>

<section class="mt-3">
    @component('website.home-layouts.layout-2.components.revista')@endcomponent
</section>

<hr style="border-top: 1px solid rgb(0, 0, 0);">

<section class="mt-3">
    @component('website.home-layouts.layout-2.components.mapasite')@endcomponent
</section>
@endsection
