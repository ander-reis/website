@extends('layouts.website')

@section('content')

    @component('website.home-layouts.layout-1.components.intro')@endcomponent
    @component('website.home-layouts.layout-1.components.noticias')@endcomponent

    <div class="line-section" style="border-color: #E45CAB"></div>

    <h1 class="text-center">A Definir 1</h1>
    <section class="mt-3 mb-3">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
                <a href="#">Ranking de Salários</a>
            </div>
            <div class="item">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
                <a href="#">Convenções e Acordos</a>
            </div>
            <div class="item">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
                <a href="#">Relação de Escolas</a>
            </div>
            <div class="item">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
                <a href="#">Direito do Professor</a>
            </div>
            <div class="item">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
                <a href="#">Cálculos</a>
            </div>
        </div>
    </section>

    @component('website.home-layouts.layout-1.components.fale-com-o-sinpro')@endcomponent
    @component('website.home-layouts.layout-1.components.eventos')@endcomponent
    @component('website.home-layouts.layout-1.components.servicos')@endcomponent
    @component('website.home-layouts.layout-1.components.revista-giz')@endcomponent


{{--    @component('website.components.layout-1._slider', ['sliders' => $sliders])@endcomponent--}}
@endsection
