@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('curriculos.edit') }}

    <div class="row">
        <div class="col-md-12">
            <h1>Alterar Curriculo</h1>
            <div class="mb-3">
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
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::model($model, ['route' => ['curriculo.update', $id], 'method' => 'PUT', 'id' => 'curriculoForm']) }}
                @include('website.curriculo._form')
                <button type="submit" class="btn btn-primary">Alterar</button>
            {{ Form::close() }}
        </div>
    </div>

    @push('update-curriculo-script')
        <script type="text/javascript">
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
                                    // notEmpty: {
                                    //     message: 'Email inválido'
                                    // },
                                    emailAddress: {
                                        message: 'Email inválido'
                                    }
                                }
                            },
                            email_confirmation: {
                                validators: {
                                    // notEmpty: {
                                    //     message: 'Confirme Email obrigatória'
                                    // },
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
                                    // notEmpty: {
                                    //     message: 'Senha obrigatório'
                                    // }
                                }
                            },
                            password_confirmation: {
                                validators: {
                                    // notEmpty: {
                                    //     message: 'Confirme Senha obrigatória'
                                    // },
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
