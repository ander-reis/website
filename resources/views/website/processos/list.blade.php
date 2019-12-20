@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Processos Judiciais</h1>

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

        <div class="alert {{($opcao['option'] === 1) ? 'alert-info' : 'alert-danger'}}">
            <p><span class="font-weight-bold">Nome:&nbsp;</span>{{ $model->first()->Nome }}</p>
            <p><span class="font-weight-bold">CPF:&nbsp;</span>{{ $model->first()->CPF }}</p>
            @if(dataFormatted($model->first()->Data_Aniversario) !== '01/01/1900')
                <p>
                    <span class="font-weight-bold">Nascimento:&nbsp;</span>
                    {{ dataFormatted($model->first()->Data_Aniversario) }}
                </p>
            @endif
            <p><span class="font-weight-bold">Acesso:&nbsp;</span>{{ $opcao['name'] }}</p>
        </div>

        <ul class="list-group">
            @foreach($processos as $processo)
                <li class="list-group-item">
                    <a href="{{ route('processos.select', ['id_processo' => $processo->id_processo]) }}" class="link-active">{{ $processo->ds_processo }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    @push('list-processos-script')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (e) {
                const form = document.getElementById('listProcessoForm');
                FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            id_processo: {
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

