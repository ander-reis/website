<h1>Previdência</h1>
<section>
    <h3>{{ $title }} Dados Pessoais</h3>
    <hr class="line">
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('ds_cpf', 'CPF', ['class' => 'control-label']) }}
            {{ Form::text('ds_cpf', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-8'])
            {{ Form::label('ds_nome', 'Nome', ['class' => 'control-label']) }}
            {{ Form::text('ds_nome', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('dt_nascimento', 'Data de Nascimento', ['class' => 'control-label']) }}
            {{ Form::date('dt_nascimento', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('ds_celular', 'Celular', ['class' => 'control-label']) }}
            {{ Form::text('ds_celular', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('ds_email', 'Email', ['class' => 'control-label']) }}
            {{ Form::text('ds_email', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-12 col-md-4'])
            {{ Form::label('Cep', 'Cep', ['class' => 'control-label']) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-info" type="button" id="search-cep">
                        <i class="fas fa-search"></i>
                        Buscar
                    </button>
                </div>
                {{ Form::text('CEP', null, ['class' => 'form-control', 'id' => 'CEP']) }}
            </div>
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
            {{ Form::label('endereco', 'Endereço', ['class' => 'control-label']) }}
            {{ Form::text('endereco', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-2'])
            {{ Form::label('ds_numero', 'Número', ['class' => 'control-label']) }}
            {{ Form::text('ds_numero', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('ds_complemento', 'Complemento', ['class' => 'control-label']) }}
            {{ Form::text('ds_complemento', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('bairro', 'Bairro', ['class' => 'control-label']) }}
            {{ Form::text('bairro', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('cidade', 'Cidade', ['class' => 'control-label']) }}
            {{ Form::text('cidade', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('estado', 'Estado', ['class' => 'control-label']) }}
            {{ Form::text('estado', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
</section>
{{ Form::button($buttonTitle, ['class' => 'btn btn-primary', 'id' => 'nextButton', 'type' => 'submit']) }}

@push('form-previdencia-cadastro-script')
    <script type="text/javascript">
        const cpf = $('#ds_cpf');
        const nome = $('#ds_nome');
        const nascimento = $('#dt_nascimento');
        const celular = $('#ds_celular');
        const email = $('#ds_email');
        const cep = $('#CEP');
        const endereco = $('#endereco');
        const numero = $('#ds_numero');
        const complemento = $('#ds_complemento');
        const bairro = $('#bairro');
        const cidade = $('#cidade');
        const estado = $('#estado');

        function inputMasks() {
            cpf.mask('000.000.000-00', {reverse: true});
            celular.mask('(00) 00000-0000');
            cep.mask('00000-000');
            estado.mask('AA');
        }

        function searchCep(CEP) {
            $("#search-cep").on("click", function () {
                pesquisacep(CEP.value);
                numero.val('');
                complemento.val('');
            });
        }

        document.addEventListener('DOMContentLoaded', function (e) {
            const form = document.getElementById('previdenciaForm');

            inputMasks();
            searchCep(CEP);

            const validCpf = FormValidation.formValidation(
                form,
                {
                    fields: {
                        ds_cpf: {
                            validators: {
                                notEmpty: {},
                                // stringLength: {
                                //     min: 14,
                                //     max: 14,
                                // },
                                callback: {
                                    message: 'CPF inválido',
                                    callback: function (input) {
                                        if (input.value !== '') {
                                            return testaCPF(input.value);
                                        } else {
                                            return true;
                                        }
                                    }
                                },
                                blank: {}
                            }
                        },
                    },
                }
            );

            cpf[0].addEventListener('blur', function (event) {
                validCpf.validate().then(function (status) {
                    if (status === 'Valid') {
                        FormValidation.utils.fetch(`/previdencia-cadastro/professor`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            params: {
                                ds_cpf: cpf.val(),
                            },
                        }).then(function (response) {
                            if (response.id) {
                                nome.val(response.ds_nome);
                                nascimento.val(response.dt_nascimento);
                                celular.val(response.ds_celular);
                                email.val(response.ds_email);
                                cep.val(response.ds_cep);
                                endereco.val(response.ds_endereco);
                                numero.val(response.ds_numero);
                                complemento.val(response.ds_complemento);
                                bairro.val(response.ds_bairro);
                                cidade.val(response.ds_cidade);
                                estado.val(response.ds_uf);
                            }
                        });
                    }
                });
            });

            const fv1 = FormValidation.formValidation(
                form,
                {
                    fields: {
                        ds_cpf: {
                            validators: {
                                notEmpty: {
                                    message: 'CPF obrigatório'
                                },
                                // stringLength: {
                                //     min: 14,
                                //     max: 14,
                                //     message: 'CPF inválido'
                                // },
                                callback: {
                                    message: 'CPF inválido',
                                    callback: function (input) {
                                        if (input.value !== '') {
                                            return testaCPF(input.value);
                                        } else {
                                            return true;
                                        }
                                    }
                                },
                                blank: {}
                            }
                        },
                        ds_nome: {
                            validators: {
                                notEmpty: {
                                    message: 'Nome obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 100,
                                    message: 'Máximo 100 carecteres'
                                },
                            }
                        },
                        dt_nascimento: {
                            format: 'YYYY/DD/MM',
                            message: 'Data obrigatório',
                        },
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
                        ds_email: {
                            validators: {
                                notEmpty: {
                                    message: 'Email obrigatório'
                                },
                                emailAddress: {
                                    message: 'Email inválido'
                                }
                            }
                        },
                        CEP: {
                            validators: {
                                notEmpty: {
                                    message: 'Cep obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 9,
                                    message: 'Máximo 9 carecteres'
                                },
                                regexp: {
                                    regexp: /^[0-9]{5}-[0-9]{3}$/,
                                    message: 'Cep inválido'
                                }
                            }
                        },
                        endereco: {
                            validators: {
                                notEmpty: {
                                    message: 'Endereço obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 80,
                                    message: 'Máximo 80 carecteres'
                                },
                            }
                        },
                        ds_numero: {
                            validators: {
                                notEmpty: {
                                    message: 'Número obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 10,
                                    message: 'Máximo 10 carecteres'
                                },
                            }
                        },
                        bairro: {
                            validators: {
                                notEmpty: {
                                    message: 'Bairro obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 59,
                                    message: 'Máximo 59 carecteres'
                                },
                            }
                        },
                        cidade: {
                            validators: {
                                notEmpty: {
                                    message: 'Cidade obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 32,
                                    message: 'Máximo 32 carecteres'
                                },
                            }
                        },
                        estado: {
                            validators: {
                                notEmpty: {
                                    message: 'Estado obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 2,
                                    message: 'Máximo 2 carecteres'
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
