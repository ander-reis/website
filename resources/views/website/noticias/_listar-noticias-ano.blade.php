{{ Breadcrumbs::render('noticias-listar') }}

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 mb-3">
                Ano:
                <div class="btn-group btn-group-sm flex-wrap" role="group" aria-label="ano">
                @foreach($anos as $ano)

                    <a href="{{ route('noticias.index', ['ano' => $ano->ano]) }}" class="btn btn-secondary" id="btn_ano">
                        <span class="{{(date('Y', strtotime($noticias[0]['dt_noticia'])) != $ano->ano) ? '' :  'text-warning'}}">
                            {{$ano->ano}}
                        </span>
                    </a>

                @endforeach
            </div>
            </div>
        </div>

        <div class="row">
            @foreach($notdestaque as $destaque)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body card-destaque">
                            <h6 class="card-subtitle mb-2 text-muted text-right">
                                {{ dataHoraFormatted($destaque->noticia->dt_cadastro) }}
                            </h6>
                            <a href="{{ route('noticias.show', ['noticia' => $destaque->noticia->id]) }}"
                               class="text-link">
                                <p class="card-text">{!! $destaque->noticia->ds_resumo !!}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <hr style="border-top: 1px solid rgb(0, 0, 0);">

        @php
            $mes = 0
        @endphp

        @foreach($noticias as $noticia)
        @if($mes != date('m', strtotime($noticia->dt_noticia)))
            <p class="not_ano_roxo">
                @php
                    $mes = date('m', strtotime($noticia->dt_noticia))
                @endphp

                {{ \Carbon\Carbon::parse($noticia->dt_noticia)->translatedFormat('F Y')}}
            </p>
        @endif

            <p class="m-0">
                <span class="not_data_laranja">
                    {{ dataFormatted($noticia->dt_noticia) }}
                </span>

                -

                <a href="{{ route('noticias.show', ['noticia' => $noticia->id]) }}"
                    class="text-link"
                    >
                    <span class="not_link">
                        {!! $noticia->ds_resumo !!}
                    </span>
                </a>
            </p>
        @endforeach
    </div>
</div>
