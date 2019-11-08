@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('curriculos') }}

    <div class="row">
        <div class="col-md-12">
                <h1>Currículos</h1>
                <p>Faça aqui uma busca de um profissional ou cadastre-se em nosso Banco de Dados</p>
        </div>
        <div class="col-md-12 mt-sm-1">
            <h4>Busca de Profissionais</h4>
            <hr class="line">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('uf', 'Estado', ['class' => 'control-label']) }}
                    {{ Form::select('uf', ['option 1', 'option 2'], null, ['placeholder' => 'Todos', 'class' => 'form-control']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('uf', 'Nível de Atuação', ['class' => 'control-label']) }}
                    {{ Form::select('uf', ['option 1', 'option 2'], null, ['placeholder' => 'Todos', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="row mt-md-2">
                <div class="col-md-6">
                    {{ Form::label('uf', 'Formação', ['class' => 'control-label']) }}
                    {{ Form::select('uf', ['option 1', 'option 2'], null, ['placeholder' => 'Qualquer Formação', 'class' => 'form-control']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('uf', 'Disciplina', ['class' => 'control-label']) }}
                    {{ Form::select('uf', ['option 1', 'option 2'], null, ['placeholder' => 'Todas', 'class' => 'form-control']) }}
                </div>
            </div>
        </div>


        <div class="col-md-12 mt-5">
            <a href="{{ route('curriculo.show', ['id' => 1]) }}" class="btn btn-primary">Curriculo Show</a>
            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-dark">Cadastrar Curriculo</a>
            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-danger">Alterar Curriculo</a>
        </div>

    </div>

@endsection
