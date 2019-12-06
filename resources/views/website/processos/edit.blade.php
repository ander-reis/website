@extends('layouts.website')

@section('content')
    <div class="col-12">
        <h1>Dados Cadastrais</h1>

        <div class="alert alert-danger">
            {{ $opcao['name'] }}
        </div>

        {{ Form::model($model, ['route' => ['processos.update', $model->id_cadastro], 'method' => 'PUT', 'id' => 'processoForm']) }}

        @component('website.processos._form', ['model' => $model])@endcomponent

        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
    </div>
@endsection
