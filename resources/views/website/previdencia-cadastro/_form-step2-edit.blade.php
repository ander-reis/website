<section>
    <hr class="line">
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('fl_empregador', 'Tipo do Empregador', ['class' => 'control-label']) }}
            {{ Form::select('fl_empregador', \Website\Http\Controllers\Website\PrevidenciaController::tipoEmpregador(), null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('ds_cnpj', 'CNPJ', ['class' => 'control-label']) }}
            {{ Form::text('ds_cnpj', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('ds_empregador', 'Empregador', ['class' => 'control-label']) }}
            {{ Form::text('ds_empregador', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('fl_cargo', 'Cargo', ['class' => 'control-label']) }}
            {{ Form::select('fl_cargo', \Website\Http\Controllers\Website\PrevidenciaController::tipoCargo(), null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('dt_admissao', 'Data admissão', ['class' => 'control-label']) }}
            {{ Form::date('dt_admissao', (isset($model->dt_admissao) ? $model->dt_admissao : \Carbon\Carbon::now()), ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('dt_demissao', 'Data saída', ['class' => 'control-label']) }}
            {{ Form::date('dt_demissao', (isset($model->dt_demissao) ? $model->dt_demissao : \Carbon\Carbon::now()), ['class' => 'form-control']) }}
        @endcomponent
    </div>
    {{ Form::button('Editar Dados&nbsp;<i class="fas fa-edit"></i>', ['class' => 'btn btn-secondary mb-3', 'id' => 'btnInsertGrid', 'type' => 'submit']) }}
</section>

@push('form-previdencia-dados-script')
    <script type="text/javascript">
        const tipo_empregador = $('#fl_empregador');
        const cnpj = $('#ds_cnpj');
        const empregador = $('#ds_empregador');
        const cargo = $('#fl_cargo');
        const admissao = $('#dt_admissao');
        const demissao = $('#dt_demissao');

        function inputMasks() {
            cnpj.mask('00.000.000/0000-00', {reverse: true});
        }

        function validationEmpregador() {
            $('#fl_empregador').on('change', function () {
                let $this = $(this);
                if ($this.val() === '5') {
                    cnpj.prop("readonly", true);
                    cnpj.val('00.000.000/0000-00');
                    empregador.prop("readonly", true);
                    empregador.val('Carnê');
                } else {
                    cnpj.prop("readonly", false);
                    cnpj.val('');
                    empregador.prop("readonly", false);
                    empregador.val('');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function (e) {
            const form = document.getElementById('previdenciaForm');

            inputMasks();
            validationEmpregador();

            const fv2 = FormValidation.formValidation(
                form,
                {
                    fields: {
                        fl_empregador: {
                            validators: {
                                choice: {
                                    min: 1,
                                    max: 1,
                                    message: 'Tipo Empregador obrigatório'
                                },
                                greaterThan: {
                                    message: 'Selecione Tipo Empregador',
                                    min: 1,
                                }
                            }
                        },
                        ds_cnpj: {
                            validators: {
                                notEmpty: {
                                    message: 'CNPJ obrigatório'
                                },
                                stringLength: {
                                    min: 18,
                                    max: 18,
                                    message: 'CNPJ inválido'
                                },
                            }
                        },
                        ds_empregador: {
                            validators: {
                                notEmpty: {
                                    message: 'Empregador obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 150,
                                    message: 'Máximo 30 carecteres'
                                },
                            }
                        },
                        fl_cargo: {
                            validators: {
                                choice: {
                                    min: 1,
                                    max: 1,
                                    message: 'Cargo obrigatório'
                                },
                                greaterThan: {
                                    message: 'Selecione Cargo',
                                    min: 1,
                                }
                            }
                        },
                        dt_admissao: {
                            format: 'YYYY/MM/DD',
                            message: 'Data obrigatório',
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        icon: new FormValidation.plugins.Icon({
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh'
                        }),
                    },
                }
            );
        });
    </script>
@endpush
