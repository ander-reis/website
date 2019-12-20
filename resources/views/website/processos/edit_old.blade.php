@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Dados Cadastrais</h1>

        {{ Form::model($model, ['route' => ['processos.update', $model->id_cadastro ?? $model->Codigo_Professor], 'method' => 'PUT', 'id' => 'processoForm']) }}

        @component('website.processos._form', ['model' => $model, 'cpf' => $cpf, 'opcao' => $opcao])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
@endsection
