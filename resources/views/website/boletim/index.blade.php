@extends('layouts.website')

@section('content')

<h2>Boletim Eletrônico</h2>

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col text-justify mb-2">
                O boletim eletrônico é o informativo do SinproSP enviado por e-mail, sempre às sextas-feiras, com as
                notícias do Sindicato, informações sobre educação, trabalho e cultura, além de dicas e promoções
                especiais. Para recebê-lo, preencha os campos abaixo.
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                {{ Form::open(['id' => 'formCadastrar', 'route' => 'boletim.store', 'method' => 'POST']) }}
                <div class="form-group" style="background: #f1f1f1;border: 1px solid;">
                    <span class="text-center">
                        <div class="row p-2 checkbox-container js-alert-field-container">
                            <div class="col-sm-12 col-lg-6 custom-control custom-radio">
                                {{ Form::radio('boletimSind',1,false,['id'=>'lblSindicalizado', 'class' => 'custom-control-input']) }}
                                {{ Form::label('lblSindicalizado', 'Sou Sindicalizado.', ['class' => 'custom-control-label']) }}
                            </div>
                            <div class="col-sm-12 col-lg-6 custom-control custom-radio">
                                {{ Form::radio('boletimSind',0,false,['id'=>'lblNSindicalizado', 'class' => 'custom-control-input']) }}
                                {{ Form::label('lblNSindicalizado', 'Não Sou Sindicalizado.', ['class' => 'custom-control-label']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div id="boletimSindMessage"></div>
                            </div>
                        </div>
                    </span>

                    <div class="row p-2">
                        <div class="col-12 col-lg-6 mb-2 fl {{ $errors->has('num_matricula') ?'has-error' : '' }}">
                            {{ Form::text('num_matricula', null, ['id' => 'num_matricula','class' => 'form-control', 'placeholder' => 'Matrícula', 'disabled']) }}
                            @include('website.components.form-components._help_block',['field' => 'num_matricula'])
                        </div>
                        <div class="col-12 col-lg-6 mb-2 fl {{ $errors->has('num_cpf') ?'has-error' : '' }}">
                            {{ Form::text('num_cpf', null, ['id' => 'num_cpf', 'class' => 'form-control', 'placeholder' => 'CPF', 'disabled']) }}
                            @include('website.components.form-components._help_block',['field' => 'num_cpf'])
                        </div>
                    </div>
                    <div class="row p-2 ">
                        <div class="col-12 mb-2 fl {{ $errors->has('ds_nome') ?'has-error' : '' }}">
                            {{ Form::text('ds_nome', null, ['id' => 'ds_nome', 'class' => 'form-control', 'placeholder' => 'Nome', 'disabled']) }}
                        </div>
                        <div class="col-12 mb-2 fl {{ $errors->has('ds_email') ?'has-error' : '' }}">
                            {{ Form::email('ds_email', null, ['id' => 'ds_email', 'class' => 'form-control', 'placeholder' => 'E-mail', 'disabled']) }}
                            @include('website.components.form-components._help_block',['field' => 'ds_email'])
                        </div>
                    </div>

                    <div class="row p-2 align-items-center checkbox-container js-alert-field-container">
                        <div class="col-sm-12 col-lg-10 mb-2" id="lecionar" name="lecionar">
                            <div class="custom-control custom-checkbox">
                                {{ Form::checkbox('lecionar[]', '1',false,['id'=>'lblPrivado', 'class' => 'custom-control-input', 'disabled']) }}
                                {{ Form::label('lblPrivado', 'Leciono em escola particular.', ['class' => 'custom-control-label mb-0']) }}
                            </div>

                            <div class="custom-control custom-checkbox">
                                {{ Form::checkbox('lecionar[]', '2',false,['id'=>'lblPublica', 'class' => 'custom-control-input', 'disabled']) }}
                                {{ Form::label('lblPublica', 'Leciono em escola publica.', ['class' => 'custom-control-label mb-0']) }}
                            </div>
                            <div class="custom-control custom-checkbox">
                                {{ Form::checkbox('lecionar[]', '3',false,['id'=>'lblOutro', 'class' => 'custom-control-input', 'disabled']) }}
                                {{ Form::label('lblOutro', 'Leciono em escola particular.', ['class' => 'custom-control-label mb-0']) }}
                            </div>
                            <div class="col-lg-12">
                                <div id="lecionarMessage"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 mb-2 text-center">
                            {{ Form::submit('Cadastrar',['name' => 'btnCadastrar', 'id' => 'btnCadastrar', 'class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                {{ Form::open(['id' => 'formExcluir', 'route' => ['boletim.destroy', 'email'], 'method' => 'DELETE']) }}
                <div class="form-group p-2" style="background: #f1f1f1;border: 1px solid;">
                    <div class="row p-2 align-items-center">
                        <div class="col-11 mb-2 fl {{ $errors->has('ds_email_excluir') ?'has-error' : '' }}">
                            {{ Form::email('ds_email_excluir', null, ['id' => 'ds_email_excluir', 'class' => 'form-control', 'placeholder' => 'E-mail para excluir']) }}
                            @include('website.components.form-components._help_block',['field' => 'ds_email_excluir'])
                        </div>
                        <div class="col-1 mb-2 text-center">
                            {{ Form::submit('Ok',['class' => 'btn btn-danger']) }}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>

        <hr style="border-top: 1px solid rgb(0, 0, 0);">

        <div class="row mt-4">
            @foreach($boletim as $bol)
            <div class="col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-header font-weight-bold p-2">
                        <span class="float-left"> Boletim nº {!! $bol->id_boletim !!} </span>
                        <span class="float-right">{!! $bol->dt_boletim_formatted !!}</span>
                    </div>
                    <div class="card-body card-bol p-2">
                        <div class="clearfix"></div>
                        <p class="text-left">
                            <a href="{{$bol->ds_link }}" target="_blank" class="text-link">
                                <span class="card-text">{!! $bol->ds_destaque !!}</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{--paginacao--}}
{!! $boletim->onEachSide(3)->links() !!}
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        strCPF = strCPF.replace(/[^a-z0-9]/gi,'');
        if (strCPF == "00000000000") return false;

        for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
    }

    $(document).ready(function(){
        $('#num_cpf').mask('000.000.000-00', {reverse: true});
    });

    document.addEventListener('DOMContentLoaded', function(e) {
    const formCadastrar = document.getElementById('formCadastrar');
    const fvCadastrar = FormValidation
        .formValidation(
            formCadastrar, {
                fields: {
                    boletimSind: {
                        validators: {
                            notEmpty: {
                                message: 'Escolha uma das opções acima'
                            }
                        }
                    },
                    num_matricula: {
                        validators: {
                            notEmpty: {
                                message: 'Informe o seu número de matrícula de sócio'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/i,
                                message: 'Somente números são permitidos'
                            },
                        }
                    },
                    num_cpf: {
                        validators: {
                            callback: {
                                message: 'CPF inválid',
                                callback: function(input) {
                                    if (input.value !== '') {
                                       return TestaCPF(input.value);
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
                                message: 'Informe o seu nome completo'
                            },
                            regexp: {
                                regexp: /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/i,
                                message: 'Nome só pode conter letras ou espaço'
                            },
                            stringLength: {
                                min: 5,
                                max: 100,
                                message: 'Informe o seu nome completo'
                            }
                        }
                    },
                    ds_email: {
                        validators: {
                            callback: {
                                message: 'E-mail inválido',
                                callback: function(input) {
                                    const value = input.value;
                                    if (value === '') {
                                        return false;
                                    }

                                    // I want the value has to pass both emailAddress and regexp validators
                                    return FormValidation.validators.emailAddress().validate({
                                        value: value,
                                    }).valid;
                                }
                            },
                            blank: {}
                        }
                    },
                    'lecionar[]': {
                        validators: {
                            notEmpty: {
                                message: 'Escolha uma das opções acima'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    excluded: new FormValidation.plugins.Excluded(),
                    tachyons: new FormValidation.plugins.Bootstrap({
                        defaultMessageContainer: false,
                        rowSelector: function(field, ele) {
                            return field === 'boletimSind' || field === 'lecionar[]' ? '.js-alert-field-container' : '.fl';
                        },
                    }),
                    submitButton: new FormValidation.plugins.SubmitButton(),

                    message: new FormValidation.plugins.Message({
                        clazz: 'red lh-copy',
                        container: function(field, ele) {
                            return field === 'boletimSind' ?
                                document.getElementById('boletimSindMessage') :
                                field === 'lecionar[]' ? document.getElementById('lecionarMessage') :
                                FormValidation.plugins.Message.getClosestContainer(ele, formCadastrar, /^(.*)fl(.*)$/);
                        },
                    }),
                },
            }
        )
        .on('core.form.valid', function() {
            $("#btnCadastrar").prop("disabled", true);
            $("#btnCadastrar").prop("value", "Aguarde !!!");

            let perg_a = 0;
            let perg_b = 0;
            let perg_c = 0;

            let lecionar = $('input[name="lecionar[]"]');

            lecionar.each(function() {
                if ($(this).is(':checked')) { //se está marcado conta mais 1
                    if ($(this).val() == 1) {
                        perg_a = 1;
                    } else if ($(this).val() == 2) {
                        perg_b = 1;
                    } else if ($(this).val() == 3) {
                        perg_c = 1;
                    }
                }
            });

            FormValidation.utils.fetch('', {
                method: 'POST',
                params: {
                    _token: "{{ csrf_token() }}",
                    num_matricula: document.getElementById('num_matricula').value,
                    num_cpf: document.getElementById('num_cpf').value,
                    ds_nome: document.getElementById('ds_nome').value,
                    ds_email: document.getElementById('ds_email').value,

                    opt_perg_a: perg_a,
                    opt_perg_b: perg_b,
                    opt_perg_c: perg_c,
                },
            }).then(function(response) {
                if (response.errors) {
                    for (const field in response.errors) {
                            if ( field == "num_cpf") {
                                // Update the message option
                                fvCadastrar.updateValidatorOption(field, 'blank', 'message', 'CPF inválido')

                                // Set the field as invalid
                                fvCadastrar.updateFieldStatus(field, 'Invalid', 'blank');
                            }
                            else {
                                // Update the message option
                                fvCadastrar.updateValidatorOption(field, 'blank', 'message', 'E-mail inválido')

                                // Set the field as invalid
                                fvCadastrar.updateFieldStatus(field, 'Invalid', 'blank');
                            }
                    }
                    $("#btnCadastrar").prop("value", "Cadastrar");
                    $("#btnCadastrar").prop("disabled", false);
                } else {
                    toastr.success('E-mail cadastrado com sucesso');
                    setInterval(function() {
                        location.reload();
                    }, 1800);
                }
            });
        });

    const formExcluir = document.getElementById('formExcluir');
    const fvExcluir = FormValidation
    .formValidation(
        formExcluir,
        {
            fields: {
                ds_email_excluir: {
                    validators: {
                        callback: {
                            message: 'E-mail inválido',
                            callback: function(input) {
                                const value = input.value;
                                if (value === '') {
                                    return false;
                                }

                                // I want the value has to pass both emailAddress and regexp validators
                                return FormValidation.validators.emailAddress().validate({
                                        value: value,
                                    }).valid;
                            },
                        }
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                tachyons: new FormValidation.plugins.Bootstrap(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                defaultSubmit: new FormValidation.plugins.DefaultSubmit()
            },
        }
    );

});
</script>
@endsection
