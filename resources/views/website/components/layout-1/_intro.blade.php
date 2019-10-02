<div>
    <a href={!! $intro[0]->ds_link !!}>
        {{-- <img class="img-fluid rounded" src="{{ asset('images/layout-1/intro/img_intro.jpg') }}" alt="{!! $intro[0]->ds_titulo !!}"> --}}
        <img class="img-fluid rounded intro-img d-none d-sm-block d-lg-block" src="{{ asset('/storage/intro/' . $intro[0]->id . '/' . $intro[0]->ds_imagem_desktop) }}" alt="{!! $intro[0]->ds_titulo !!}">
        <img class="img-fluid rounded intro-img d-block d-sm-none d-lg-none" src="{{ asset('/storage/intro/' . $intro[0]->id . '/' . $intro[0]->ds_imagem_mobile) }}" alt="{!! $intro[0]->ds_titulo !!}">
    </a>
</div>
<div class="line-section intro_border"></div>
