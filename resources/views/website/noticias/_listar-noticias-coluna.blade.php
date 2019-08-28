{{ Breadcrumbs::render('noticias-listar') }}

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card border-danger">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted text-right">Teste</h6>
                        Noticia Fixa
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-danger">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted text-right">Teste</h6>
                        Noticia Fixa
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-danger">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted text-right">Teste</h6>
                        Noticia Fixa
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-danger">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted text-right">Teste</h6>
                        Noticia Fixa
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