@extends('layouts.website')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-header text-center alert alert-dark">
                        <h3>Processos Judiciais</h3>
                    </div>
                    <div class="card-body">

                        @if($errors->any())
                            <ul class="alert alert-danger alert-dismissible fade show">
                                @foreach($errors->all() as $error)
                                    <li class="list-group">{{$error}}</li>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                @endforeach
                            </ul>
                        @endif

                        {{ Form::open(['route' => 'processos.list', 'id' => 'indexProcessForm']) }}
                        <div class="form-group">
                            {{ Form::label('cpf', 'CPF', ['class' => 'control-label']) }}
                            {{ Form::text('cpf', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('nascimento', 'Data de nascimento', ['class' => 'control-label']) }}
                            {{ Form::date('nascimento', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('opcao', 'Opções de acesso', ['class' => 'control-label']) }}
                            <div class="radio">
                                <div class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('opcao', '1', true, ['class' => 'custom-control-input', 'id' => 'beneficiario']) }}
                                    {{ Form::label('beneficiario', 'Beneficiário', ['class' => 'custom-control-label']) }}
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    {{ Form::radio('opcao', '0', false, ['class' => 'custom-control-input', 'id' => 'inventariante']) }}
                                    {{ Form::label('inventariante', 'Inventariante', ['class' => 'custom-control-label']) }}
                                </div>
                            </div>
                        </div>
                        {{ Form::submit('Prosseguir', ['class' => 'btn btn-success']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('index-processos-script')
        <script type="text/javascript">
            function TestaCPF(strCPF) {
                var Soma;
                var Resto;
                Soma = 0;
                strCPF = strCPF.replace(/[^a-z0-9]/gi, '');
                if (strCPF == "00000000000") return false;

                for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
                Resto = (Soma * 10) % 11;

                if ((Resto == 10) || (Resto == 11)) Resto = 0;
                if (Resto != parseInt(strCPF.substring(9, 10))) return false;

                Soma = 0;
                for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
                Resto = (Soma * 10) % 11;

                if ((Resto == 10) || (Resto == 11)) Resto = 0;
                if (Resto != parseInt(strCPF.substring(10, 11))) return false;
                return true;
            }

            document.addEventListener('DOMContentLoaded', function (e) {
                $('#cpf').mask('000.000.000-00', {reverse: true});
                const form = document.getElementById('indexProcessForm');
                FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            cpf: {
                                validators: {
                            callback: {
                                message: 'CPF inválido',
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
                            nascimento: {
                                validators: {
                                    notEmpty: {
                                        message: 'Data de nascimento obrigatório'
                                    },
                                    stringLength: {
                                        min: 10,
                                        max: 10,
                                        message: 'Data de nascimento inválido'
                                    },
                                },
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
