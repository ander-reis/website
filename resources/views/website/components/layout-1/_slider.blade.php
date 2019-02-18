{{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
    {{--<ol class="carousel-indicators">--}}
        {{--@foreach($sliders as $key => $slider)--}}
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" @if($key === 0) class="active" @endif ></li>--}}
        {{--@endforeach--}}
    {{--</ol>--}}
    {{--<div class="carousel-inner" role="listbox">--}}
        {{--@foreach($sliders as $key => $slider)--}}
            {{--<div class="carousel-item @if($key === 0) active @endif">--}}
                {{--<a href="{{ $slider->ds_link }}">--}}
                    {{--<img class="d-block img-fluid" src="{{ asset("storage/upload/{$slider->slider_relative}") }}" alt="{{ $slider->ds_titulo }}">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h5>{{ $slider->ds_label }}</h5>--}}
                        {{--<p>{{ $slider->ds_titulo }}</p>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
    {{--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
        {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
        {{--<span class="sr-only">Previous</span>--}}
    {{--</a>--}}
    {{--<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
        {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
        {{--<span class="sr-only">Next</span>--}}
    {{--</a>--}}
{{--</div>--}}


{{--example--}}
<div class="col-lg-5 m-auto bg-slider">
    <div id="carousel-sinpro" class="carousel slide mt-3" data-ride="carousel">
        <ol class="carousel-indicators">
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/layout-1/slider/slider_1.jpeg') }}" alt="Campanha Salarial 2019">
                <div class="carousel-caption">
                    <h5 class="mt-3">Campanha Salarial 2019</h5>
                    <p>Não sabe o que isso significa? Venha assistir a palestra do SinproSP</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/layout-1/slider/slider_2.jpeg') }}" alt="Escola Sem Partido">
                <div class="carousel-caption">
                    <h5 class="mt-3">Escola Sem Partido</h5>
                    <p>Não sabe o que isso significa? Venha assistir a palestra do SinproSP</p>
                </div>
            </div>
        </div>
    </div>
</div>
