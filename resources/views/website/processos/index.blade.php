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

                        {{ Form::open(['route' => 'processos.store', 'id' => 'processForm']) }}
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
                        {{ Form::submit('Entrar', ['class' => 'btn btn-success']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('index-processos-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (e) {
                $('#cpf').mask('000.000.000-00', {reverse: true});
                const form = document.getElementById('processForm');
                FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            cpf: {
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
