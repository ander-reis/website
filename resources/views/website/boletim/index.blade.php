@extends('layouts.website')

@section('content')

<h2>Boletim Eletrônico</h2>

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col text-justify mb-2">
                O boletim eletrônico é o informativo do SinproSP enviado por e-mail, sempre às sextas-feiras, com as
                notícias do Sindicato, informações sobre educação, trabalho e cultura, além de dicas e promoções
                especiais. Para recebê-lo, preencha os campos abaixo.
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-lg-8">
                {{ Form::open(['route' => 'boletim.store', 'method' => 'POST']) }}
                <div class="form-group" style="background: #f1f1f1;border: 1px solid;">
                    <span class="text-center">
                        <div class="row p-2 {{ $errors->has('boletimsind') ?'has-error' : '' }}">
                            <div class="col">
                                {{ Form::radio('boletimsind',1) }}
                                {{ Form::label('titulo', 'Sou Sindicalizado', ['class' => 'control-label']) }}
                            </div>
                            <div class="col">
                                {{ Form::radio('boletimsind',0) }}
                                {{ Form::label('titulo', 'Não Sou Sindicalizado', ['class' => 'control-label']) }}
                            </div>
                        </div>
                        <div class="col mt-0 pt-0">@include('website.components.form-components._help_block',['field' => 'boletimsind'])</div>

                    </span>

                    <div class="row p-2">
                        <div class="col {{ $errors->has('num_matricula') ?'has-error' : '' }}">
                            {{ Form::text('num_matricula', null, ['id' => 'num_matricula','class' => 'form-control', 'placeholder' => 'Matrícula']) }}
                            @include('website.components.form-components._help_block',['field' => 'num_matricula'])
                        </div>
                        <div class="col {{ $errors->has('num_cpf') ?'has-error' : '' }}">
                            {{ Form::text('num_cpf', null, ['class' => 'form-control', 'placeholder' => 'CPF']) }}
                            @include('website.components.form-components._help_block',['field' => 'num_cpf'])
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12 mb-2 {{ $errors->has('ds_email') ?'has-error' : '' }}">
                            {{ Form::text('ds_nome', null, ['class' => 'form-control', 'placeholder' => 'Nome']) }}
                            @include('website.components.form-components._help_block',['field' => 'ds_nome'])
                        </div>
                        <div class="col-sm-12 mb-2 {{ $errors->has('ds_email') ?'has-error' : '' }}">
                            {{ Form::email('ds_email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) }}
                            @include('website.components.form-components._help_block',['field' => 'ds_email'])
                        </div>
                    </div>

                    <div class="row p-2 align-items-center">
                        <div class="col-sm-12 col-lg-8 mb-2" id="lecionar" name="lecionar">
                            <div class="custom-checkbox">
                                {{ Form::checkbox('opt_perg_a', '') }}
                                {{ Form::label('lbl_a', 'Leciono em escola particular.', ['class' => 'control-label mb-0']) }}
                            </div>
                            <div class="custom-checkbox">
                                {{ Form::checkbox('opt_perg_b', '') }}
                                {{ Form::label('lbl_b', 'Leciono em escola pública.', ['class' => 'control-label m-0']) }}
                            </div>
                            <div class="custom-checkbox">
                                {{ Form::checkbox('opt_perg_c', '') }}
                                {{ Form::label('lbl_b', 'Outra função.', ['class' => 'control-label m-0']) }}
                            </div>
                            @include('website.components.form-components._help_block',['field' => 'lecionar'])
                        </div>
                        <div class="col-sm-12 col-lg-4 mb-2 text-center">
                            {{ Form::submit('Cadastrar',['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

            <div class="col-lg-2"></div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-2"></div>

            <div class="col-lg-8">
                {{ Form::open(['route' => ['boletim.destroy', 'email'], 'method' => 'DELETE']) }}
                    <div class="form-group p-2" style="background: #f1f1f1;border: 1px solid;">
                        <div class="row p-2 align-items-center">
                            <div class="col-9 col-lg-10 mb-2 {{ $errors->has('ds_email_excluir') ?'has-error' : '' }}">
                                {{ Form::email('ds_email_excluir', null, ['class' => 'form-control', 'placeholder' => 'E-mail para excluir']) }}
                                @include('website.components.form-components._help_block',['field' => 'ds_email_excluir'])
                            </div>
                            <div class="col-2 mb-2 text-center">
                                {{ Form::submit('Ok',['class' => 'btn btn-danger']) }}
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>

            <div class="col-lg-2"></div>
        </div>

        <hr style="border-top: 1px solid rgb(0, 0, 0);">

        <div class="row mt-4">
            @foreach($boletim as $bol)
            <div class="col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-header font-weight-bold p-2">
                        <span class="float-left"> Boletim nº {!! $bol->id_boletim !!} </span>
                        <span class="float-right">{!! $bol->dt_boletim_formatted !!}</span>
                    </div>
                    <div class="card-body card-bol p-2">
                        <div class="clearfix"></div>
                        <p class="text-left">
                            <a href="{{$bol->ds_link }}" target="_blank" class="text-link">
                                <span class="card-text">{!! $bol->ds_destaque !!}</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{--paginacao--}}
{!! $boletim->onEachSide(3)->links() !!}

@endsection
