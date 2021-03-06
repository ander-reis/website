@extends('layouts.website')

@section('content')
    <div class="container">

        {{ Breadcrumbs::render('curriculos.edit') }}

        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="mb-md-3">Cadastro de Currículo</h1>
                <hr>
                {{ Form::open(['route' => 'register', 'id' => 'curriculoForm']) }}
                @include('website.curriculo._form')
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    @push('create-curriculo-script')
        <script type="text/javascript">

            $('#ds_cep').mask('00000-000');
            $('#ds_cpf').mask('000.000.000-00', {reverse: true});
            $('#ds_fone').mask('(00) 0000-0000');
            $('#ds_celular').mask('(00) 00000-0000');
           // $('#ds_salario').mask("#.##0,00", {reverse: true});

            document.addEventListener('DOMContentLoaded', function (e) {
                const curriculoForm = document.getElementById('curriculoForm');
                FormValidation.formValidation(
                    curriculoForm,
                    {
                        fields: {
                            ds_nome: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nome obrigatório'
                                    },
                                    stringLength: {
                                        min: 1,
                                        max: 50,
                                        message: 'Máximo 50 carecteres'
                                    },
                                }
                            },
                            ds_cpf: {
                                validators: {
                                    notEmpty: {
                                        message: 'CPF obrigatório'
                                    },
                                    stringLength: {
                                        min: 14,
                                        max: 14,
                                        message: 'CPF inválido'
                                    },
                                }
                            },
                            ds_sexo: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Sexo obrigatório'
                                    },
                                }
                            },
                            dt_data_nasc: {
                                format: 'YYYY/DD/MM',
                                message: 'Data obrigatório',
                            },
                            int_estado_civil: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Estado Civil obrigatório'
                                    },
                                    greaterThan: {
                                        message: 'Selecione Estado Civil',
                                        min: 1,
                                    }
                                }
                            },
                            ds_cep: {
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
                            ds_endereco: {
                                validators: {
                                    notEmpty: {
                                        message: 'Endereço obrigatório'
                                    },
                                    stringLength: {
                                        min: 1,
                                        max: 100,
                                        message: 'Máximo 100 carecteres'
                                    },
                                }
                            },
                            ds_bairro: {
                                validators: {
                                    notEmpty: {
                                        message: 'Bairro obrigatório'
                                    },
                                    stringLength: {
                                        min: 1,
                                        max: 50,
                                        message: 'Máximo 50 carecteres'
                                    },
                                }
                            },
                            ds_cidade: {
                                validators: {
                                    notEmpty: {
                                        message: 'Cidade obrigatório'
                                    },
                                    stringLength: {
                                        min: 1,
                                        max: 30,
                                        message: 'Máximo 30 carecteres'
                                    },
                                }
                            },
                            ds_estado: {
                                validators: {
                                    notEmpty: {
                                        message: 'Estado obrigatório'
                                    },
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Estado obrigatório'
                                    },
                                    greaterThan: {
                                        message: 'Selecione um Estado',
                                        min: 1,
                                    }
                                }
                            },
                            ds_pais: {
                                validators: {
                                    notEmpty: {
                                        message: 'País obrigatório'
                                    },
                                    stringLength: {
                                        min: 1,
                                        max: 30,
                                        message: 'Máximo 30 carecteres'
                                    },
                                }
                            },
                            ds_fone: {
                                validators: {
                                    notEmpty: {
                                        message: 'Telefone obrigatório'
                                    },
                                    stringLength: {
                                        min: 1,
                                        max: 20,
                                        message: 'Máximo 20 carecteres'
                                    },
                                }
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
                            ds_salario: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pretensão Salarial obrigatório'
                                    },
                                    stringLength: {
                                        min: 1,
                                        max: 13,
                                        message: 'Máximo 13 carecteres'
                                    },
                                }
                            },
                            int_empregado: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Empregado atualmente obrigatório'
                                    },
                                }
                            },
                            int_disp_horario: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Disponibilidade de horário obrigatório'
                                    },
                                }
                            },
                            int_disp_cidade: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Disponibilidade para mudar de cidade obrigatório'
                                    },
                                }
                            },
                            int_formacao: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Qual sua formação obrigatório'
                                    },
                                    greaterThan: {
                                        message: 'Selecione sua formação',
                                        min: 1,
                                    }
                                }
                            },
                            int_disciplina: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Disciplina obrigatório'
                                    },
                                    greaterThan: {
                                        message: 'Selecione sua disciplina',
                                        min: 1,
                                    }
                                }
                            },
                            int_nivel_atuacao: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Nível de atuação obrigatório'
                                    },
                                    greaterThan: {
                                        message: 'Selecione sua atuação',
                                        min: 1,
                                    }
                                }
                            },
                            ds_objetivo: {
                                validators: {
                                    notEmpty: {
                                        message: 'Objetivo obrigatório'
                                    },
                                }
                            },
                            ds_qualificacao: {
                                validators: {
                                    notEmpty: {
                                        message: 'Qualificação obrigatório'
                                    },
                                }
                            },
                            ds_experiencia: {
                                validators: {
                                    notEmpty: {
                                        message: 'Experiência obrigatório'
                                    },
                                }
                            },


                            email: {
                                validators: {
                                    notEmpty: {
                                        message: 'Email inválido'
                                    },
                                    emailAddress: {
                                        message: 'Email inválido'
                                    }
                                }
                            },
                            email_confirmation: {
                                validators: {
                                    notEmpty: {
                                        message: 'Confirme Email obrigatória'
                                    },
                                    identical: {
                                        compare: function () {
                                            return curriculoForm.querySelector('[name="email"]').value;
                                        },
                                        message: 'O email e sua confirmação não são as mesmas'
                                    }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: 'Senha obrigatório'
                                    },
                                    stringLength: {
                                        min: 6,
                                        max: 30,
                                        message: 'Máximo 30 carecteres'
                                    },
                                }
                            },
                            password_confirmation: {
                                validators: {
                                    notEmpty: {
                                        message: 'Confirme Senha obrigatória'
                                    },
                                    stringLength: {
                                        min: 6,
                                        max: 30,
                                        message: 'Máximo 30 carecteres'
                                    },
                                    identical: {
                                        compare: function () {
                                            return curriculoForm.querySelector('[name="password"]').value;
                                        },
                                        message: 'A senha e sua confirmação não são as mesmas'
                                    }
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
@endsection
