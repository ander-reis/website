@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h2>Busca de conteúdo</h2>
            <div class="mt-4">
                {{ Form::open(['route' => 'busca.executa', 'method' => 'POST']) }}

                @component('website.form-components._form_group',['field' => 'Buscar'])
                    {{ Form::label('Buscar', 'Termos de busca:', ['class' => 'control-label']) }}
                    {{ Form::text('Buscar', null , ['class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'O que deseja procurar?']) }}   
                @endcomponent

                <div class="mt-2">
                    {{ Form::submit('Procurar',['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}

            @if(isset($termo))

                @if($noticias->count() == 0 && $clausulas->count() == 0)
                    <div class="rounded bg-warning mt-3 p-1">
                        Resultados encontrados para o termo  
                        <span class="font-italic font-weight-bold">
                            {{ $termo }}
                        </span>
                    </div>
                    <div class="text-danger p-1">Não foram encontrados resultados!</div>
                @else
                    @if($noticias->count() > 0)
                        <div class="rounded bg-warning mt-3 p-1">
                            <span class="font-weight-bold">{{ $noticias->count() }}</span>
                            @if($noticias->count() == 1)
                                resultado encontrado
                            @else
                                resultados encontrados
                            @endif
                            em <span class="font-italic">Notícias</span> para o termo  
                            <span class="font-italic font-weight-bold">
                                {{ $termo }}
                            </span>
                        </div>

                        <div class="mt-3">
                            @foreach($noticias as $noticia)
                                <strong>&raquo;</strong> <a href="..\noticias\{{ $noticia->id_noticia }}" target="_blank">[{{ dataFormatted($noticia->dt_noticia) }}] {{ $noticia->ds_resumo }}</a><br>
                            @endforeach
                        </div>
                    @endif

                    @if($clausulas->count() > 0)
                        <div class="rounded bg-warning mt-3 p-1">
                            <span class="font-weight-bold">{{ $clausulas->count() }}</span>
                            @if($clausulas->count() == 1)
                                resultado encontrado
                            @else
                                resultados encontrados
                            @endif
                            em <span class="font-italic">Convenções e Acordos</span> para o termo  
                            <span class="font-italic font-weight-bold">
                                {{ $termo }}
                            </span>
                        </div>

                        <div class="mt-3">
                            @foreach($clausulas as $clausula)
                                <strong>&raquo;</strong> <a href="..\convencoes-e-acordo\{{ $clausula->fl_entidade }}\{{ $clausula->id_convencao }}\{{ $clausula->id_clausula }}" target="_blank">{{ $clausula->ds_titulo }} ({{ $clausula->ds_entidade }}/{{ $clausula->dt_validade }})</a><br>
                            @endforeach
                        </div>
                    @endif
                @endif
            @endif
            </div>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
