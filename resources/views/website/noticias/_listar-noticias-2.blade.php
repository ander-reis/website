{{ Breadcrumbs::render('noticias-listar') }}

<div class="row">
    <div class="col-12 col-md-9">
        <div class="row">
            @foreach($noticias as $noticia)
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <a href="{{ route('noticias.show', ['noticia' => $noticia->id_noticia]) }}">
                            <img src="{{ asset('images/layout-1/noticias/jose-simao.jpg') }}" class="card-img-top"
                                 alt="...">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('noticias.show', ['noticia' => $noticia->id_noticia]) }}">
                                <p class="card-text">{!! $noticia->ds_resumo !!}</p>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

    @component('website.components._column-right')@endcomponent

</div>

{{--paginacao--}}
{!! $noticias->links() !!}
