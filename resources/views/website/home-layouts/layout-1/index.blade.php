@extends('layouts.website')

@section('content')

{{-- @component('website.home-layouts.layout-1.components.intro')@endcomponent --}}
@component('website.home-layouts.layout-1.components.destaque')@endcomponent

<section class="mt-3">
    @component('website.home-layouts.layout-1.components.faixa')@endcomponent
</section>

<section class="mt-3 ml-3">
    @component('website.home-layouts.layout-1.components.noticias2')@endcomponent
</section>
<section class="mt-3 ml-2 mr-2">
    @component('website.home-layouts.layout-1.components.servicos')@endcomponent
</section>
<section class="mt-3 ml-2 mr-2">
    @component('website.home-layouts.layout-1.components.revista')@endcomponent
</section>

<hr style="border-top: 1px solid rgb(0, 0, 0);">

<section class="mt-3 ml-2 mr-2">
    @component('website.home-layouts.layout-1.components.mapasite')@endcomponent
</section>
@endsection
