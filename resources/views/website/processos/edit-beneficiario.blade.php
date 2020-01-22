@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Dados Cadastrais</h1>
        <p class="text-info">{{ $processo->ds_processo ?? null }}</p>

        {{ Form::model($model, ['route' => ['processos.update.beneficiario', $model->id_cadastro ?? $model->Codigo_Professor], 'method' => 'PUT', 'id' => 'processoForm']) }}

        @component('website.processos._form_beneficiario', ['model' => $model ?? null, 'cpf' => $cpf ?? null, 'opcao' => $opcao ?? null, 'cadastroProfessores' => $cadastroProfessores ?? null])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
@endsection
