<section id="section2" class="mt-5 mb-5">
    <div class="owl-carousel owl-theme">
        @foreach($owlItems as $item)
            <div class="item">
                {!! $item->ds_icone !!}
                <a href="{{ $item->ds_link }}">{!! $item->ds_titulo !!}</a>
            </div>
        @endforeach
    </div>
</section>