@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('curriculos.index') }}

    <div class="row">
        <div class="col-md-12">
            <h1>Busca de Profissionais</h1>
            <p>Faça aqui uma busca de um profissional ou cadastre-se em nosso Banco de Dados</p>
        </div>
        <div class="col-md-12 mb-3">
            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-dark">Cadastrar Curriculo</a>
            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-danger">Alterar Curriculo</a>
        </div>
        @auth()
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <span>Olá, {{ \Auth::user()->ds_nome }}</span>
                            </div>
                            {{--LOGOUT--}}
                            <div class="col-2">
                                <a class="btn btn-sm btn-outline-danger float-right" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
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
        </div>
    </div>
@endsection

