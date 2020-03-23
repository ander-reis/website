@extends('layouts.website')

@section('content')

    <div class="col-md-12">
        <h1>Ocorrências</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::open(['route' => 'corona.store', 'id' => 'createCoronaForm']) }}
        @component('website.corona._form')@endcomponent
        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>
    @push('form-corona-script')
        <script type="text/javascript">
            $('#id_motivo').on('change', function() {
                const $this = $(this);
                const outros = $this[0].value;

                let divOutros = $('#createCoronaForm > div > div.ds');

                if(outros === '1') {
                    divOutros.removeClass('d-none');
                } else {
                    divOutros.addClass('d-none');
                }
            });
            document.addEventListener('DOMContentLoaded', function (e) {
                const form = document.getElementById('createCoronaForm');
                FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            ds_escola: {
                                validators: {
                                    notEmpty: {
                                        message: 'Nome obrigatório'
                                    },
                                }
                            },
                            id_motivo: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Motivo obrigatório'
                                    },
                                    greaterThan: {
                                        message: 'Selecione um Motivo',
                                        min: 1,
                                    }
                                }
                            },
                            ds_funcionario: {
                                validators: {
                                    notEmpty: {
                                        message: 'Campo obrigatório'
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
