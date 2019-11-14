@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('curriculos.index') }}

    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h1>Busca de Profissionais</h1>
            <p>Faça aqui uma busca de um profissional ou cadastre-se em nosso Banco de Dados</p>

            <div class="col-md-12 mb-3">
                <a href="{{ route('register') }}" class="btn btn-sm btn-outline-dark">Cadastrar Curriculo</a>
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-danger">Alterar Curriculo</a>
            </div>
            @auth()
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <span>Olá, {{ \Auth::user()->ds_nome }}</span>
                                </div>
                                {{--LOGOUT--}}
                                <div class="col-2">
                                    <a class="btn btn-sm btn-outline-danger float-right" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

            <div class="col-md-12 mt-sm-1">
                <h4>Busca de Profissionais</h4>
                <hr class="line">
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('uf', 'Estado', ['class' => 'control-label']) }}
                        {{ Form::select('uf', \Website\Http\Controllers\Website\CurriculoController::siglaEstados(), null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('int_nivel_atuacao', 'Nível de Atuação', ['class' => 'control-label']) }}
                        {{ Form::select('int_nivel_atuacao', selectAtuacaoFormatted(0)->pluck('ds_nivel_atuacao', 'id_nivel_atuacao'), null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="row mt-md-2">
                    <div class="col-md-6">
                        {{ Form::label('int_formacao', 'Formação', ['class' => 'control-label']) }}
                        {{ Form::select('int_formacao', selectFormacaoFormatted(0)->pluck('ds_formacao', 'id_formacao'), null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('int_disciplina', 'Disciplina', ['class' => 'control-label']) }}
                        {{ Form::select('int_disciplina', selectDisciplinaFormatted(0)->pluck('ds_disciplina', 'id_disciplina'), null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <button class="btn btn-outline-secondary mt-3" type="button" id="buscar-curriculo">Buscar</button>
                <hr class="line">
            </div>
            @include('website.components.layout-1._preloader-circulo')
            <div class="col-12 text-center">
                <span id="curriculo_none"></span>
            </div>
            <div class="col-12">
                <div id="qtd_curriculo" class="alert alert-info" style="display: none"></div>
                <div id="curriculo"></div>
            </div>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>

    @push('busca-curriculo-script')
        <script type="text/javascript">
            $(document).ready(function () {
                $('#buscar-curriculo').click(function (e) {
                    $('#curriculo').html('');
                    $('#curriculo_none').html('');
                    $('#qtd_curriculo').html('').hide();
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('/curriculo/busca') }}",
                        method: 'post',
                        dataType: 'json',
                        data: {
                            uf: $('#uf').val(),
                            int_nivel_atuacao: $('#int_nivel_atuacao').val(),
                            int_formacao: $('#int_formacao').val(),
                            int_disciplina: $('#int_disciplina').val(),
                        },
                        beforeSend: () => {
                            $('#preloader-circulo').show();
                        },
                        success: function (data) {
                            console.log(data);
                            let curriculos = data.data;
                            let data_curriculo = "";
                            let text = "";

                            if(curriculos.length <= 1){
                                text = `Foi encotrado ${curriculos.length} profissional.`
                            } else {
                                text = `Foram encotrados ${curriculos.length} profissionais.`
                            }
                            $('#qtd_curriculo').append(text).show();

                            if (curriculos.length === 0) {
                                data_curriculo = '<h6>Não foi encontrado nenhum resultado!</h6>';
                                $('#curriculo_none').append(data_curriculo);
                            }

                            for (let i in curriculos) {
                                data_curriculo = `
                                <div class="mb-4">
                                <a href="/curriculo/${curriculos[i].id_curriculo}" class="link-active">${curriculos[i].ds_nome}</a>
                                <div>${curriculos[i].ds_cidade} - ${curriculos[i].ds_estado}</div></div>`;
                                $('#curriculo').append(data_curriculo);
                            }
                            // loading stop
                            $(document).ajaxComplete(() => {
                                $('#preloader-circulo').hide();
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection


