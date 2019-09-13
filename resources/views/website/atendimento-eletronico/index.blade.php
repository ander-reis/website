@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9">
            <h2 class="mb-4">Atendimento Eletrônico</h2>
            <div class="mb-5">
                <p>Se você busca esclarecimentos de dúvidas na área trabalhista, previdenciária, sobre legislação educacional ou sobre qualquer
                assunto relacionado ao trabalho desenvolvido pelo Sindicato, utilize os campos abaixo para nos enviar sua mensagem. A resposta
                será enviada o mais breve possível.</p>
            </div>
            
            {{ Form::open(['route' => 'atendimento-eletronico.store']) }}

            @component('website.form-components._form_group',['field' => 'txtNome'])
                {{ Form::label('txtNome', 'Nome', ['class' => 'control-label']) }}
                {{ Form::text('txtNome', null, ['class' => 'form-control', 'maxlength' => 80, 'placeholder' => 'Informe seu nome']) }}            
            @endcomponent

            @component('website.form-components._form_group',['field' => 'txtEmail'])
                {{ Form::label('txtEmail', 'E-mail', ['class' => 'control-label']) }}
                {{ Form::email('txtEmail', null, ['class' => 'form-control', 'placeholder' => 'Informe um e-mail válido']) }}            
            @endcomponent

            @component('website.form-components._form_group',['field' => 'selDpto'])
                {{ Form::label('selDpto', 'Selecione o assunto/departamento:', ['class' => 'control-label']) }}
                
                {{ Form::select('selDpto', ['1' => 'Atendimento', '2' => 'Previdência'], null, ['placeholder' => 'Escolha uma opção...', 'class' => 'form-control']) }}
               
                <!--
                    Form::select('id_categoria', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'id_categoria'), null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control'])                    
                    Form::select('selDpto', \App\Models\AtendimentoDptos::pluck('ds_departamento', 'id_departamento'), null, ['placeholder' => 'Escolha uma opção...', 'class' => 'form-control'])
                 -->
                

            @endcomponent

            @component('website.form-components._form_group',['field' => 'txtMsg'])
                {{ Form::label('txtMsg', 'Texto a ser enviado:', ['class' => 'control-label']) }}
                {{ Form::textarea('txtMsg', null, ['class' => 'form-control', 'rows' => 5]) }}
            @endcomponent

            @component('website.form-components._form_group',['field' => 'optPrivacidade'])
                <div class="custom-control custom-checkbox custom-control-inline my-2">
                    {{ Form::checkbox('optPrivacidade', '1', true, ['class' => 'custom-control-input', 'id' => 'optPrivacidade']) }}
                    {{ Form::label('optPrivacidade', 'Estou ciente de que o SinproSP respeita a privacidade e restringe o acesso à quaisquer informações que eu mencionar nesse atendimento.', ['class' => 'custom-control-label']) }}
                </div>
            @endcomponent

            {!! Recaptcha::render() !!}

            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Enviar ao SinproSP</button>
            </div>

            {{ Form::close() }}
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
