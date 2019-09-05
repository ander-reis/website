@extends('layouts.website')

@section('content')

{{-- @component('website.home-layouts.layout-1.components.intro')@endcomponent --}}
@component('website.components.layout-1._destaque')@endcomponent

<section class="mt-3">
    @component('website.components.layout-1._faixa')@endcomponent
</section>

<section class="mt-3">
    @component('website.components.layout-1._noticias2')@endcomponent
</section>

<section class="mt-3">
    @component('website.components.layout-1._servicos')@endcomponent
</section>

<section class="mt-3">
    @component('website.components.layout-1._revista')@endcomponent
</section>

<hr style="border-top: 1px solid rgb(0, 0, 0);">

<section class="mt-3">
    @component('website.components.layout-1._mapasite')@endcomponent
</section>
@endsection
