<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
        {{ Form::label('ds_celular', 'Celular', ['class' => 'control-label']) }}
        {{ Form::text('ds_celular', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group', ['class' => 'col-md-8'])
        {{ Form::label('ds_nome', 'Nome', ['class' => 'control-label']) }}
        {{ Form::text('ds_nome', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
        {{ Form::label('dt_pergunta', 'Data da Pergunta', ['class' => 'control-label']) }}
        {{ Form::text('dt_pergunta', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('ds_pergunta', 'Pergunta', ['class' => 'control-label']) }}
        {{ Form::textarea('ds_pergunta', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
        {{ Form::label('dt_resposta', 'Data da Resposta', ['class' => 'control-label']) }}
        {{ Form::text('dt_resposta', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('ds_resposta', 'Resposta', ['class' => 'control-label']) }}
        {{ Form::textarea('ds_resposta', null, ['class' => 'form-control']) }}
    @endcomponent
</div>

@push('form-whatsapp-script')
    <script type="text/javascript">

        const celular = $('#ds_celular');
        const dtPergunta = $('#dt_pergunta');
        const dtResposta = $('#dt_resposta');

        function inputMasks() {
            celular.mask('(00) 00000-0000');
            dtPergunta.mask('00/00/0000');
            dtResposta.mask('00/00/0000');
        }

        document.addEventListener('DOMContentLoaded', function (e) {
            const form = document.getElementById('whatsappForm');

            inputMasks();

            FormValidation.formValidation(
                form,
                {
                    fields: {
                        ds_celular: {
                            validators: {
                                notEmpty: {
                                    message: 'Celular obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 20,
                                    message: 'Máximo 20 carecteres'
                                },
                            }
                        },
                        ds_nome: {
                            validators: {
                                stringLength: {
                                    min: 0,
                                    max: 100,
                                    message: 'Máximo 100 carecteres'
                                },
                            }
                        },
                        dt_pergunta: {
                            validators: {
                                notEmpty: {
                                    message: 'Data obrigatório'
                                },
                                date: {
                                    format: 'DD/MM/YYYY',
                                    message: 'Data inválida',
                                }
                            }
                        },
                        ds_pergunta: {
                            validators: {
                                notEmpty: {
                                    message: 'Pergunta obrigatório'
                                },
                            }
                        },
                        dt_resposta: {
                            validators: {
                                notEmpty: {
                                    message: 'Data obrigatório'
                                },
                                date: {
                                    format: 'DD/MM/YYYY',
                                    message: 'Data inválida',
                                }
                            }
                        },
                        ds_resposta: {
                            validators: {
                                notEmpty: {
                                    message: 'Resposta obrigatório'
                                },
                            }
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
