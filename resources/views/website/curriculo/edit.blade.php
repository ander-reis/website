@extends('layouts.website')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Alterar Curriculo</h1>


            {{--LOGOUT--}}
            <a class="btn btn-primary" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            {{--LOGADO--}}
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                Olá {{ Auth::user()->ds_nome }}
            </div>

            {{ Form::model($model, ['route' => ['curriculo.update', $model], 'method' => 'PUT', 'id' => 'curriculoForm']) }}
                @include('website.curriculo._form')
                <button type="submit" class="btn btn-primary">Alterar</button>
            {{ Form::close() }}

        </div>
    </div>

    @push('update-curriculo-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (e) {
                const curriculoForm = document.getElementById('curriculoForm');
                const submitButton = curriculoForm.querySelector('[type="submit"]');
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
                                        min: 3,
                                        max: 50,
                                        message: 'Nome não pode ser maior que 50 caracteres'
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
                                    }
                                }
                            },

                            email: {
                                validators: {
                                    notEmpty: {
                                        message: 'email inválido'
                                    },
                                    emailAddress: {
                                        message: 'The value is not a valid email address'
                                    }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
                                    }
                                }
                            },
                            password_confirmation: {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap(),
                            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                            // fieldStatus: new FormValidation.plugins.FieldStatus({
                            //     onStatusChanged: function (areFieldsValid) {
                            //         areFieldsValid ? submitButton.removeAttribute('disabled')
                            //             : submitButton.setAttribute('disabled', 'disabled');
                            //     }
                            // }),
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
