@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h1>Previdência</h1>
            <div class="card mb-3">
                <h5 class="card-header text-white bg-dark">{{ $model->ds_nome }}</h5>
                <div class="card-body">
                    <div>
                        <strong>CPF:</strong>
                        <span>{{ $model->ds_cpf }}</span>
                    </div>
                    <div>
                        <strong>E-mail:</strong>
                        <span>{{ $model->ds_email }}</span>
                    </div>
                    <a href="{{ route('previdencia-cadastro.edit.professor', $model->id) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>

            <h2>{{ $title }} Dados Profissionais</h2>
            {{ Form::model($model, ['route' => 'previdencia-cadastro.store', 'id' => 'previdenciaForm']) }}
                @include('website.previdencia-cadastro._form-step2')
                {{ Form::button('<i class="fas fa-check"></i>&nbsp;Enviar Informações', ['class' => 'btn btn-primary', 'id' => 'btnSendData', 'disabled', 'style' => 'display:none;', 'type' => 'submit']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
