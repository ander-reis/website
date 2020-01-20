@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Dados Cadastrais</h1>
        <p class="text-info">{{ $processo->ds_processo ?? null }}</p>

        {{ Form::model($model, ['route' => ['processos.update.inventariante', $cadastroProfessores->Codigo_Professor, $model->id_cadastro], 'method' => 'PUT', 'id' => 'processoForm']) }}

        @component('website.processos._form_inventariante', ['model' => $model ?? null, 'cpf' => $cpf ?? null, 'opcao' => $opcao ?? null, 'cadastroProfessores' => $cadastroProfessores ?? null])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
@endsection
