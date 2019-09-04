{{ Breadcrumbs::render('noticias-listar') }}

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card border-danger">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted text-right">Teste</h6>
                        <a href="{{ route('noticias.show', ['noticia' => 3634]) }}">
                            Redobre os cuidados com a hora extra
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-danger">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted text-right">Campanha Salarial</h6>
                        <a href="{{ route('noticias.show', ['noticia' => 3634]) }}">
                            Dissídio Coletivo: MPT dá parecer a favor dos professores
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-danger">
                    <div class="card-body">
                        <a href="{{ route('noticias.show', ['noticia' => 3634]) }}">
                            <h6 class="card-subtitle mb-2 text-muted text-right">Teste</h6>
                            Os "sem poupança na CEF" receberão os R$ 500,00 do Fundo só a partir de outubro
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-danger">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted text-right">Teste</h6>
                        <a href="{{ route('noticias.show', ['noticia' => 3634]) }}">
                            Novos videos da Associação Juízes Para A Democracia alertam sobre a MP da Liberdade
                            Econômica
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border-top: 1px solid rgb(0, 0, 0);">

        <div class="row mt-4">
            @foreach($noticias as $noticia)
            <div class="col-md-3 mb-5">
                <div class="card border-secondary">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted text-right">{!! $noticia->dt_cadastro_formatted !!}
                        </h6>
                        <a href="{{ route('noticias.show', ['noticia' => $noticia->id_noticia]) }}">
                            <p class="card-text">{!! $noticia->ds_resumo !!}</p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- @component('website.components._column-right')@endcomponent --}}

</div>

{{--paginacao--}}
{!! $noticias->links() !!}
