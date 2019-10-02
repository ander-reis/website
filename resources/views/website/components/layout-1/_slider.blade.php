<div>
    <div id="carousel-sinpro" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($sliders as $slider)
                <li data-target="#carousel-sinpro" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : ''}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}}">
                <a href={!! $slider->ds_link !!}>
                    <div class="gradient_img">
                        <img class="d-block w-100" src="{{ asset('/storage/slider/' . $slider->id . '/' . $slider->ds_imagem) }}" alt="{!! $slider->ds_label !!}">
                    </div>
                    <div class="carousel-caption p-2">
                        <h5 class="m-0 p-0">{!! $slider->ds_label !!}</h5>
                        <p class="m-0 pb-2">{!! $slider->ds_titulo !!}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
