@extends('layouts.website')

@section('content')
    {{ Form::open(['id' => 'previdenciaForm']) }}
    @include('website.previdencia._form')
    {{ Form::close() }}

    <div class="modal fade" id="prevModal" tabindex="-1" role="dialog" aria-labelledby="Editar" aria-hidden="true">
        <form id="formModal" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Dados Profissionais</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @component('website.form-components._form_col_group', ['class' => 'col-12'])
                                {{ Form::label('fl_empregador_modal', 'Tipo do Empregador', ['class' => 'control-label']) }}
                                {{ Form::select('fl_empregador_modal', \Website\Http\Controllers\Website\PrevidenciaController::tipoEmpregador(), null, ['class' => 'form-control']) }}
                            @endcomponent
                            @component('website.form-components._form_col_group', ['class' => 'col-12'])
                                {{ Form::label('ds_cnpj_modal', 'CNPJ', ['class' => 'control-label']) }}
                                {{ Form::text('ds_cnpj_modal', null, ['class' => 'form-control']) }}
                            @endcomponent
                            @component('website.form-components._form_col_group', ['class' => 'col-12'])
                                {{ Form::label('ds_empregador_modal', 'Empregador', ['class' => 'control-label']) }}
                                {{ Form::text('ds_empregador_modal', null, ['class' => 'form-control']) }}
                            @endcomponent
                        </div>
                        <div class="row">
                            @component('website.form-components._form_col_group', ['class' => 'col-12'])
                                {{ Form::label('fl_cargo_modal', 'Cargo', ['class' => 'control-label']) }}
                                {{ Form::select('fl_cargo_modal', \Website\Http\Controllers\Website\PrevidenciaController::tipoCargo(), null, ['class' => 'form-control']) }}
                            @endcomponent
                            @component('website.form-components._form_col_group', ['class' => 'col-6'])
                                {{ Form::label('dt_admissao_modal', 'Data admissão', ['class' => 'control-label']) }}
                                {{ Form::date('dt_admissao_modal', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                            @endcomponent
                            @component('website.form-components._form_col_group', ['class' => 'col-6'])
                                {{ Form::label('dt_demissao_modal', 'Data saída', ['class' => 'control-label']) }}
                                {{ Form::date('dt_demissao_modal', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                            @endcomponent
                        </div>
                        {{ Form::hidden('id_modal', null, ['id' => 'id_modal']) }}
                        {{ Form::hidden('index', null, ['id' => 'index']) }}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" id="editButton">Editar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
