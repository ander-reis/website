@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Processos Judiciais</h1>

        {{ Form::open(['route' => 'processos.edit', 'id' => 'listProcessoForm']) }}

        <div class="alert {{($opcao['option'] === 1) ? 'alert-info' : 'alert-danger'}}">
            <p><span class="font-weight-bold">Nome:&nbsp;</span>{{ $model->first()->Nome }}</p>
            <p><span class="font-weight-bold">CPF:&nbsp;</span>{{ $model->first()->CPF }}</p>
            <p><span class="font-weight-bold">Nascimento:&nbsp;</span>{{ dataFormatted($model->first()->Data_Aniversario) }}</p>
            <p><span class="font-weight-bold">Acesso:&nbsp;</span>{{ $opcao['name'] }}</p>
        </div>

        {{ Form::hidden('ds_cpf', $model->first()->CPF, ['class' => 'form-control']) }}
        {{ Form::hidden('ds_opcao', $opcao['option'], ['class' => 'form-control']) }}

        <div class="form-group">
            {{ Form::select('ds_processo', $processos->pluck('ds_processo', 'id_processo')->prepend('Selecione um processo', '0'), null, ['class' => 'form-control']) }}
        </div>

        {{ Form::submit('Prosseguir', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>

    @push('list-processos-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (e) {
                const form = document.getElementById('listProcessoForm');
                FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            ds_processo: {
                                validators: {
                                    choice: {
                                        min: 1,
                                        max: 1,
                                        message: 'Selecione um processo'
                                    },
                                    greaterThan: {
                                        message: 'Selecione um processo',
                                        min: 1,
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

