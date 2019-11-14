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
        </div>
        <div class="col-md-12 mt-5">
            <button class="btn btn-outline-secondary" type="button" id="buscar-curriculo">Buscar</button>
        </div>
        <div class="col-md-12 mt-5">
            <a href="{{ route('curriculo.show', ['id' => 1]) }}" class="btn btn-primary">Curriculo Show</a>
        </div>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>

    @push('busca-curriculo-script')
        <script type="text/javascript">
            $(document).ready(function () {

                $('#buscar-curriculo').click(function (e) {

                    var uf = $('#uf').val();
                    var int_nivel_atuacao = $('#int_nivel_atuacao').val();
                    var int_formacao = $('#int_formacao').val();
                    var int_disciplina = $('#int_disciplina').val();
                    console.log('uf: ' + uf, 'atuacao: ' + int_nivel_atuacao, 'formacao: ' + int_formacao, 'disciplina: ' + int_disciplina);

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
                        success: function (result) {
                            // $('#Endereco').val(result.Logradouro);
                            // $('#Bairro').val(result.Bairro);
                            // $('#Cidade').val(result.Cidade);
                            // $('#UF').val(result.UF);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection

