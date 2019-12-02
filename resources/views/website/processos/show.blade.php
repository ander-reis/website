
@extends('layouts.website')

@section('content')
    <h1>Processos Judiciais</h1>
    <div>
        CPF: {{ $model->first()->CPF }}
    </div>
    <div>
        Data de Nascimento: {{ dataFormatted($model->first()->Data_Aniversario) }}
    </div>

    {{--professor--}}
{{--    {{ dd($model->first()->professor) }}--}}
    {{--banco--}}
{{--    {{ dd($model->first()->professor->banco) }}--}}


    {{ Form::label('id_processo', 'Processo', ['class' => 'control-label']) }}
    {{ Form::select('id_processo', $processos->pluck('ds_processo', 'id_processo'), null, ['placeholder' => 'Selecione o Processo', 'class' => 'form-control']) }}

@endsection
