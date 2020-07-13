<div class="float-right">
    {{ link_to_route('processos.sair', 'Sair', null, ['class' => 'btn btn-danger btn-sm']) }}
</div>

<h5>Informações Pessoais</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-8'])
        {{ Form::label('Nome', 'Nome', ['class' => 'control-label']) }}
        {{ Form::text('Nome', null, ['class' => 'form-control text-uppercase']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('Sexo', 'Sexo', ['class' => 'control-label']) }}
        {{ Form::select('Sexo', [ -1 => 'Selecione o Sexo', 0 => 'Masculino', 1 => 'Feminino'], null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('CPF', 'CPF', ['class' => 'control-label']) }}
        {{ Form::text('CPF', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('RG', 'RG', ['class' => 'control-label']) }}
        {{ Form::text('RG', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('Data_Aniversario', 'Data de Nascimento', ['class' => 'control-label']) }}
        {{ Form::date('Data_Aniversario', (isset($model->Data_Aniversario) ? dataInputFormatted($model->Data_Aniversario) : null), ['class' => 'form-control']) }}
    @endcomponent
</div>

<h5>Endereço</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-12 col-md-4'])
        {{ Form::label('CEP', 'CEP', ['class' => 'control-label']) }}
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
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-6'])
        {{ Form::label('endereco', 'Endereço', ['class' => 'control-label']) }}
        {{ Form::text('endereco', null, ['class' => 'form-control text-uppercase']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-2'])
        {{ Form::label('Numero', 'Número', ['class' => 'control-label']) }}
        {{ Form::text('Numero', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])
        {{ Form::label('Complemento', 'Complemento', ['class' => 'control-label']) }}
        {{ Form::text('Complemento', null, ['class' => 'form-control text-uppercase']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])
        {{ Form::label('bairro', 'Bairro', ['class' => 'control-label']) }}
        {{ Form::text('bairro', null, ['class' => 'form-control text-uppercase']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])
        {{ Form::label('cidade', 'Cidade', ['class' => 'control-label']) }}
        {{ Form::text('cidade', null, ['class' => 'form-control text-uppercase']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])
        {{ Form::label('estado', 'Estado', ['class' => 'control-label']) }}
        {{ Form::text('estado', null, ['class' => 'form-control text-uppercase', 'maxlength' => 2]) }}
    @endcomponent
</div>

<h5>Contato</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-12'])
        {{ Form::label('Email', 'E-mail', ['class' => 'control-label']) }}
        {{ Form::text('Email', null, ['class' => 'form-control', 'id' => 'email1']) }}
    @endcomponent
</div>
<h5>Telefones</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-2'])
        {{ Form::label('DDD_Telefone_Residencial', 'DDD', ['class' => 'control-label']) }}
        {{ Form::text('DDD_Telefone_Residencial', null, ['class' => 'form-control', 'maxlength' => 2]) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('Telefone_Residencial', 'Residencial', ['class' => 'control-label']) }}
        {{ Form::text('Telefone_Residencial', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-2'])
        {{ Form::label('DDD_Telefone_Celular', 'DDD', ['class' => 'control-label']) }}
        {{ Form::text('DDD_Telefone_Celular', null, ['class' => 'form-control', 'maxlength' => 2]) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('Telefone_Celular', 'Celular', ['class' => 'control-label']) }}
        {{ Form::text('Telefone_Celular', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<h5>Conta Bancária</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4 col-lg-4'])
        {{ Form::label('Banco', 'Banco', ['class' => 'control-label']) }}
        {{ Form::select('Banco', \Website\Models\CadastroBanco::getBanco()->pluck('Banco', 'CodBanco')->prepend('Selecione o Banco', '0'), null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-2 col-lg-2'])
        {{ Form::label('Agencia', 'Agência', ['class' => 'control-label']) }}
        {{ Form::text('Agencia', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-2 col-lg-2'])
        {{ Form::label('agenciaDV', 'DV', ['class' => 'control-label']) }}
        {{ Form::text('agenciaDV', null, ['class' => 'form-control', 'maxlength' => 2]) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-2 col-lg-2'])
        {{ Form::label('Conta', 'Conta', ['class' => 'control-label']) }}
        {{ Form::text('Conta', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-2 col-lg-2'])
        {{ Form::label('contaDV', 'DV', ['class' => 'control-label']) }}
        {{ Form::text('contaDV', null, ['class' => 'form-control', 'maxlength' => 2]) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-3'])
        {{ Form::label('Poupanca', 'É conta poupança?', ['class' => 'control-label']) }}
        <div class="radio">
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('Poupanca', '1', false, ['class' => 'custom-control-input', 'id' => 'poupanca_ativo']) }}
                {{ Form::label('poupanca_ativo', 'Sim', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('Poupanca', '0', true, ['class' => 'custom-control-input', 'id' => 'poupanca']) }}
                {{ Form::label('poupanca', 'Não', ['class' => 'custom-control-label']) }}
            </div>
        </div>
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-3'])
        {{ Form::label('Conjunta', 'É conta conjunta?', ['class' => 'control-label']) }}
        <div class="radio">
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('Conjunta', '1', false, ['class' => 'custom-control-input', 'id' => 'conjunta_ativo']) }}
                {{ Form::label('conjunta_ativo', 'Sim', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('Conjunta', '0', true, ['class' => 'custom-control-input', 'id' => 'conjunta']) }}
                {{ Form::label('conjunta', 'Não', ['class' => 'custom-control-label']) }}
            </div>
        </div>
    @endcomponent
</div>
<h5>Dados do Beneficiário</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('CPF_Beneficiario', 'CPF', ['class' => 'control-label']) }}
        <p class="form-control text-danger font-weight-bold">{{ $cpf ?? null }}</p>
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-8'])
        {{ Form::label('Nome_beneficiario', 'Nome', ['class' => 'control-label']) }}
        <p class="form-control text-danger font-weight-bold">{{ $cadastroProfessores->Nome ?? null }}</p>
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-6'])
        {{ Form::label('PIS', 'PIS', ['class' => 'control-label']) }}
        {{ Form::text('PIS', $cadastroProfessores->PIS ?? null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-6'])
        {{ Form::label('Nome_Mae', 'Nome completo da Mãe', ['class' => 'control-label']) }}
        {{ Form::text('Nome_Mae', $cadastroProfessores->Nome_Mae ?? null, ['class' => 'form-control text-uppercase']) }}
    @endcomponent
</div>

<div class="row">
    {{ Form::hidden('id_processo', $id_processo ?? null) }}
    {{ Form::hidden('professor', $cadastroProfessores->Codigo_Professor ?? null) }}
    @if($errors->any())
        @component('website.form-components._form_col_group',['class' => 'col-12'])
            <ul class="alert alert-danger alert-dismissible fade show">
                @foreach($errors->all() as $error)
                    <li class="list-group">{{$error}}</li>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                @endforeach
            </ul>
        @endcomponent
    @endif
</div>
@push('form-processos-script')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function (e) {
            const form = document.getElementById('processoForm');
            $('#CEP').mask('00000-000');
            $('#CPF').mask('000.000.000-00', {reverse: true});
            $("#search-cep").on("click", function () {
                pesquisacep(CEP.value);
                $('#Numero').val('');
                $('#Complemento').val('');
            });
            FormValidation.formValidation(
                form,
                {
                    fields: {
                        Nome: {
                            validators: {
                                notEmpty: {
                                    message: 'Nome obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 100,
                                    message: 'Máximo 100 caracteres'
                                },
                            }
                        },
                        Sexo: {
                            validators: {
                                greaterThan: {
                                    message: 'Selecione Sexo',
                                    min: 0,
                                }
                            }
                        },
                        CPF: {
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
                        RG: {
                            validators: {
                                notEmpty: {
                                    message: 'RG obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 12,
                                    message: 'Máximo 12 caracteres'
                                },
                            }
                        },
                        Data_Aniversario: {
                            validators: {
                                notEmpty: {
                                    message: 'Data obrigatório'
                                },
                            },
                            format: 'YYYY/DD/MM',
                            message: 'Data obrigatório',
                        },
                        CEP: {
                            validators: {
                                notEmpty: {
                                    message: 'Cep obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 9,
                                    message: 'Máximo 9 caracteres'
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
                                    max: 63,
                                    message: 'Endereço 63 caracteres'
                                },
                            }
                        },
                        Numero: {
                            validators: {
                                notEmpty: {
                                    message: 'Número obrigatório'
                                }
                            }
                        },
                        Complemento: {
                            validators: {
                                stringLength: {
                                    min: 1,
                                    max: 50,
                                    message: 'Máximo 50 caracteres'
                                }
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
                                    message: 'Máximo 59 caracteres'
                                }
                            }
                        },
                        cidade: {
                            validators: {
                                notEmpty: {
                                    message: 'Cidade obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 21,
                                    message: 'Máximo 21 caracteres'
                                }
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
                                    message: 'Máximo 2 caracteres'
                                }
                            }
                        },
                        Email: {
                            validators: {
                                notEmpty: {
                                    message: 'Email obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 120,
                                    message: 'Máximo 120 caracteres'
                                }
                            }
                        },
                        /*DDD_Telefone_Residencial: {
                            validators: {
                                notEmpty: {
                                    message: 'DDD obrigatório'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 2,
                                    message: 'Máximo 2 caracteres'
                                }
                            }
                        },
                        Telefone_Residencial: {
                            validators: {
                                notEmpty: {
                                    message: 'Telefone obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 20,
                                    message: 'Máximo 20 caracteres'
                                }
                            }
                        },*/
                        DDD_Telefone_Celular: {
                            validators: {
                                notEmpty: {
                                    message: 'DDD obrigatório'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 2,
                                    message: 'Máximo 2 caracteres'
                                }
                            }
                        },
                        Telefone_Celular: {
                            validators: {
                                notEmpty: {
                                    message: 'Celular obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 20,
                                    message: 'Máximo 15 caracteres'
                                }
                            }
                        },
                        Banco: {
                            validators: {
                                notEmpty: {
                                    message: 'Banco obrigatório'
                                },
                                choice: {
                                    min: 1,
                                    max: 1,
                                    message: 'Banco obrigatório'
                                },
                                greaterThan: {
                                    message: 'Selecione um Banco',
                                    min: 1,
                                }
                            }
                        },
                        Agencia: {
                            validators: {
                                notEmpty: {
                                    message: 'Agência obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 8,
                                    message: 'Máximo 8 caracteres'
                                }
                            }
                        },
                        Conta: {
                            validators: {
                                notEmpty: {
                                    message: 'Conta obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 18,
                                    message: 'Máximo 18 caracteres'
                                }
                            }
                        },
                        PIS: {
                            validators: {
                                notEmpty: {
                                    message: 'PIS obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 15,
                                    message: 'Máximo 15 caracteres'
                                },
                            }
                        },
                        Nome_Mae: {
                            validators: {
                                notEmpty: {
                                    message: 'Nome obrigatório'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 100,
                                    message: 'Máximo 100 caracteres'
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
