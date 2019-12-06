@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Dados Cadastrais</h1>

        <div class="alert alert-danger">
            {{ $opcao['name'] }}
        </div>

        {{ Form::open(['route' => 'processos.store']) }}

        @component('website.processos._form')@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>

    @push('list-processos-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (e) {
                const form = document.getElementById('updateProcessoForm');

                $('#CEP').mask('00000-000');
                $('#ds_cpf').mask('000.000.000-00', {reverse: true});
                // $('#ds_fone').mask('(00) 0000-0000');
                // $('#ds_celular').mask('(00) 00000-0000');

                $("#search-cep").on("click", function (){
                    pesquisacep(CEP.value);
                });

                FormValidation.formValidation(
                    form,
                    {
                        fields: {
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

